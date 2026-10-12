<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NewsService
{
    /**
     * Fetch real-time news about Palestine from International and Indonesian API feeds.
     */
    public function fetchAndSyncNews(): array
    {
        return Cache::remember('palestine_realtime_news', 300, function () {
            $feeds = [
                [
                    'url' => 'https://news.google.com/rss/search?q=Palestina+Indonesia&hl=id&gl=ID&ceid=ID:id',
                    'category' => 'Berita Indonesia',
                    'fallback_source' => 'Media Indonesia'
                ],
                [
                    'url' => 'https://news.google.com/rss/search?q=Palestine+Gaza&hl=en-US&gl=US&ceid=US:en',
                    'category' => 'Berita Internasional',
                    'fallback_source' => 'Global News'
                ],
            ];

            foreach ($feeds as $feed) {
                try {
                    $response = Http::timeout(6)->get($feed['url']);

                    if ($response->successful()) {
                        $xml = simplexml_load_string($response->body());
                        if ($xml && isset($xml->channel->item)) {
                            $count = 0;
                            foreach ($xml->channel->item as $item) {
                                if ($count >= 15) break;

                                $title = (string)$item->title;
                                $link = (string)$item->link;
                                $pubDate = date('Y-m-d H:i:s', strtotime((string)$item->pubDate));
                                $source = isset($item->source) ? (string)$item->source : $feed['fallback_source'];
                                $slug = Str::slug(Str::limit($title, 80) . '-' . strtotime($pubDate));

                                News::updateOrCreate(
                                    ['url' => $link],
                                    [
                                        'title' => $title,
                                        'slug' => $slug,
                                        'source' => $source,
                                        'summary' => strip_tags((string)$item->description ?? $title),
                                        'image_url' => 'images/dome-of-rock.jpg',
                                        'published_at' => $pubDate,
                                        'category' => $feed['category']
                                    ]
                                );
                                $count++;
                            }
                        }
                    }
                } catch (\Exception $e) {
                    Log::warning('Live News API fetch deferred: ' . $e->getMessage());
                }
            }

            // Return latest news items from database
            return News::latest('published_at')->take(30)->get()->toArray();
        });
    }

    /**
     * Get live news feed from DB with fallback seed.
     */
    public function getLatestNews($limit = 10)
    {
        $news = News::latest('published_at')->take($limit)->get();

        if ($news->isEmpty()) {
            $this->seedInitialNews();
            $news = News::latest('published_at')->take($limit)->get();
        }

        return $news;
    }

    public function seedInitialNews()
    {
        $items = [
            // Indonesian News Items
            [
                'title' => 'Indonesia Pimpin Konsolidasi Masyarakat Sipil Asia-Pasifik untuk Kemerdekaan Palestina',
                'source' => 'Kompas.id',
                'url' => 'https://www.kompas.id',
                'image_url' => 'images/dome-of-rock.jpg',
                'summary' => 'Delegasi Indonesia memimpin deklarasi koalisi masyarakat sipil se-Asia Pasifik di Jakarta dalam upaya memperkuat dukungan diplomatik dan kemanusiaan untuk kemerdekaan Palestina.',
                'category' => 'Berita Indonesia',
                'published_at' => now()->subHours(1),
            ],
            [
                'title' => 'Kemlu RI dan BAZNAS Salurkan Bantuan Medis dan Ambulans Tambahan ke Palestina',
                'source' => 'ANTARA News',
                'url' => 'https://www.antaranews.com',
                'image_url' => 'images/cities/gaza.jpg',
                'summary' => 'Pemerintah Indonesia bersama BAZNAS dan berbagai lembaga zakat nasional memfasilitasi pengiriman obat-obatan, obat gawat darurat, serta dukungan fasilitas kesehatan.',
                'category' => 'Berita Indonesia',
                'published_at' => now()->subHours(3),
            ],
            [
                'title' => 'MUI dan Organisasi Kemasyarakatan Indonesia Serukan Aksi Solidaritas Global untuk Al-Quds',
                'source' => 'Republika Online',
                'url' => 'https://republika.co.id',
                'image_url' => 'images/cities/jerusalem.jpg',
                'summary' => 'Majelis Ulama Indonesia bersama organisasi lintas agama menggelar workshop edukasi dan kampanye solidaritas budaya untuk mendukung hak-hak sipil warga Palestina.',
                'category' => 'Berita Indonesia',
                'published_at' => now()->subHours(6),
            ],
            // International News Items
            [
                'title' => 'UN Human Rights Council Emphasizes Protection of Civilians in Gaza and West Bank',
                'source' => 'UN News',
                'url' => 'https://news.un.org',
                'image_url' => 'images/dome-of-rock.jpg',
                'summary' => 'International delegations call for immediate humanitarian relief corridors, clean water access, and medical supplies across all Palestinian territories.',
                'category' => 'Berita Internasional',
                'published_at' => now()->subHours(2),
            ],
            [
                'title' => 'Cultural Heritage Preservation Initiatives Launched in Historic Jerusalem & Hebron',
                'source' => 'Palestine Chronicle',
                'url' => 'https://palestinechronicle.com',
                'image_url' => 'images/cities/hebron.jpg',
                'summary' => 'UNESCO and local scholars launch digital archiving project to document ancient architecture, manuscripts, and olive groves in Old City Jerusalem.',
                'category' => 'Berita Internasional',
                'published_at' => now()->subHours(5),
            ],
            [
                'title' => 'Global Youth Rallies Champion Educational Resources for Palestinian Students',
                'source' => 'Al Jazeera English',
                'url' => 'https://aljazeera.com',
                'image_url' => 'images/cities/ramallah.jpg',
                'summary' => 'Universities worldwide establish scholarship programs and virtual learning platforms to support Palestinian students affected by regional disruptions.',
                'category' => 'Berita Internasional',
                'published_at' => now()->subHours(8),
            ],
        ];

        foreach ($items as $item) {
            News::firstOrCreate(
                ['title' => $item['title']],
                [
                    'slug' => Str::slug($item['title']),
                    'source' => $item['source'],
                    'url' => $item['url'],
                    'image_url' => $item['image_url'],
                    'summary' => $item['summary'],
                    'category' => $item['category'],
                    'published_at' => $item['published_at'],
                ]
            );
        }
    }
}
