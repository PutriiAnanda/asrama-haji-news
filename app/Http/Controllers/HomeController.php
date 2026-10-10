<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    private function fetchGoogleNews($limit = 5)
    {
        $externalNews = [];
        try {
            $rssUrl = "https://news.google.com/rss/search?q=" . urlencode("Kementerian Haji dan Umrah Indonesia") . "&hl=id&gl=ID&ceid=ID:id";
            $context = stream_context_create([
                'http' => [
                    'timeout' => 3,
                    'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'
                ]
            ]);

            $rssContent = @file_get_contents($rssUrl, false, $context);

            if ($rssContent !== false) {
                $xml = @simplexml_load_string($rssContent);
                if ($xml && isset($xml->channel->item)) {
                    $count = 0;
                    foreach ($xml->channel->item as $item) {
                        if ($count >= $limit) break;
                        $source = (string) $item->source ?? 'Media Nasional';
                        
                        $externalNews[] = [
                            'title' => (string) $item->title,
                            'link' => (string) $item->link,
                            'pubDate' => \Carbon\Carbon::parse((string) $item->pubDate)->translatedFormat('d M Y - H:i') . ' WITA',
                            'timeAgo' => \Carbon\Carbon::parse((string) $item->pubDate)->diffForHumans(),
                            'source' => $source
                        ];
                        $count++;
                    }
                }
            }
        } catch (\Exception $e) {
            $externalNews = [];
        }

        return $externalNews;
    }

    public function index()
    {
        // Berita lokal untuk beranda utama (maksimal 4 berita terbaru di bawah featured)
        $posts = Post::with('category')
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get();

        $featuredPost = $posts->first();
        $latestPosts = $posts->skip(1)->take(4); // Batasi 4 berita di beranda
        $externalNews = $this->fetchGoogleNews(5);

        $tarakanData = [
            'temp' => '31°C',
            'aqi' => '28',
            'aqi_label' => 'Baik',
            'bpih' => 'Rp 56,04 Juta'
        ];

        try {
            $weather = Http::timeout(2)->get('https://api.open-meteo.com/v1/forecast?latitude=3.33&longitude=117.61&current_weather=true');
            if ($weather->successful()) {
                $tarakanData['temp'] = round($weather->json('current_weather.temperature')) . '°C';
            }

            $aqiRes = Http::timeout(2)->get('https://air-quality-api.open-meteo.com/v1/air-quality?latitude=3.33&longitude=117.61&current=us_aqi');
            if ($aqiRes->successful()) {
                $aqiVal = $aqiRes->json('current.us_aqi') ?? 28;
                $tarakanData['aqi'] = $aqiVal;
                if ($aqiVal <= 50) $tarakanData['aqi_label'] = 'Baik';
                elseif ($aqiVal <= 100) $tarakanData['aqi_label'] = 'Sedang';
                else $tarakanData['aqi_label'] = 'Tidak Sehat';
            }
        } catch (\Exception $e) {}

        return view('welcome', [
            'featuredPost' => $featuredPost,
            'posts' => $latestPosts,
            'externalNews' => $externalNews,
            'tarakanData' => $tarakanData
        ]);
    }

    // METHOD BARU: Arsip Lengkap Berita Resmi + Paginasi (1, 2, 3...)
    public function beritaLokal()
    {
        $posts = Post::with('category')
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->paginate(6); // Menampilkan 6 berita per halaman dengan penomoran

        return view('berita_lokal', compact('posts'));
    }

    public function rekomendasi()
    {
        $externalNews = $this->fetchGoogleNews(15);
        return view('rekomendasi', compact('externalNews'));
    }

    public function show($slug)
    {
        $post = Post::with('category')->where('slug', $slug)->where('status', 'published')->firstOrFail();
        $post->increment('views');
        return view('show', compact('post'));
    }
}