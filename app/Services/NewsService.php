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
     * Fetch real-time news about Palestine and cache/sync to DB.
     */
    public function fetchAndSyncNews(): array
    {
        return Cache::remember('palestine_realtime_news', 300, function () {
            try {
                $feedUrl = 'https://news.google.com/rss/search?q=Palestine+Gaza&hl=en-US&gl=US&ceid=US:en';
                $response = Http::timeout(5)->get($feedUrl);

                if ($response->successful()) {
                    $xml = simplexml_load_string($response->body());
                    if ($xml && isset($xml->channel->item)) {
                        $count = 0;
                        foreach ($xml->channel->item as $item) {
                            if ($count >= 15) break;

                            $title = (string)$item->title;
                            $link = (string)$item->link;
                            $pubDate = date('Y-m-d H:i:s', strtotime((string)$item->pubDate));
                            $source = isset($item->source) ? (string)$item->source : 'Global News';
                            $slug = Str::slug(Str::limit($title, 80) . '-' . strtotime($pubDate));

                            News::firstOrCreate(
                                ['url' => $link],
                                [
                                    'title' => $title,
                                    'slug' => $slug,
                                    'source' => $source,
                                    'summary' => strip_tags((string)$item->description ?? $title),
                                    'image_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=800',
                                    'published_at' => $pubDate,
                                    'category' => 'Humanitarian & World'
                                ]
                            );
                            $count++;
                        }
                    }
                }
            } catch (\Exception $e) {
                Log::warning('Live News API fetch deferred: ' . $e->getMessage());
            }

            // Return latest news items from database
            return News::latest('published_at')->take(20)->get()->toArray();
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
            [
                'title' => 'UN Human Rights Council Emphasizes Protection of Civilians in Gaza and West Bank',
                'source' => 'UN News',
                'url' => 'https://news.un.org',
                'image_url' => 'https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?w=800',
                'summary' => 'International delegations call for immediate humanitarian relief corridors, clean water access, and medical supplies across all Palestinian territories.',
                'category' => 'Humanitarian',
                'published_at' => now()->subHours(2),
            ],
            [
                'title' => 'Cultural Heritage Preservation Initiatives Launched in Historic Jerusalem & Hebron',
                'source' => 'Palestine Chronicle',
                'url' => 'https://palestinechronicle.com',
                'image_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=800',
                'summary' => 'UNESCO and local scholars launch digital archiving project to document ancient architecture, manuscripts, and olive groves in Old City Jerusalem.',
                'category' => 'Culture & Heritage',
                'published_at' => now()->subHours(5),
            ],
            [
                'title' => 'Global Youth Rallies Champion Educational Resources for Palestinian Students',
                'source' => 'Al Jazeera English',
                'url' => 'https://aljazeera.com',
                'image_url' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=800',
                'summary' => 'Universities worldwide establish scholarship programs and virtual learning platforms to support Palestinian students affected by regional disruptions.',
                'category' => 'Education',
                'published_at' => now()->subHours(8),
            ],
            [
                'title' => 'Palestinian Farmers Celebrate Annual Olive Harvest Amidst Community Solidarity',
                'source' => 'WAFA News Agency',
                'url' => 'https://wafa.ps',
                'image_url' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800',
                'summary' => 'Volunteers join local farming families across Ramallah and Nablus for the seasonal olive harvest, celebrating Palestinian roots and resilience.',
                'category' => 'Community',
                'published_at' => now()->subHours(12),
            ],
            [
                'title' => 'New Academic Study Highlights the Resilience of Palestinian Traditional Embroidery (Tatreez)',
                'source' => 'Middle East Eye',
                'url' => 'https://middleeasteye.net',
                'image_url' => 'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?w=800',
                'summary' => 'Research underscores how centuries-old Tatreez patterns serve as living historical archives representing specific Palestinian villages and identity.',
                'category' => 'Culture & Art',
                'published_at' => now()->subDays(1),
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
