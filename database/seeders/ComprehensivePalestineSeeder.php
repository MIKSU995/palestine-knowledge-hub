<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\EducationalResource;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\TimelineEvent;
use App\Models\User;
use App\Services\NewsService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class ComprehensivePalestineSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Roles & Admin User
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        Role::firstOrCreate(['name' => 'Editor']);
        Role::firstOrCreate(['name' => 'User']);

        $admin = User::firstOrCreate(
            ['email' => 'admin@palestinehub.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('admin123')
            ]
        );
        $admin->assignRole('Admin');

        // 2. Categories
        $categoriesData = [
            [
                'name' => 'History & Heritage',
                'slug' => 'history-heritage',
                'description' => 'Exploring thousands of years of Palestinian history, civilization, and enduring historical landmarks.',
                'color' => 'emerald',
                'icon' => 'book-open'
            ],
            [
                'name' => 'Culture & Arts',
                'slug' => 'culture-arts',
                'description' => 'Traditions, poetry, music, Tatreez embroidery, culinary history, and artistic expression.',
                'color' => 'amber',
                'icon' => 'sparkles'
            ],
            [
                'name' => 'Geography & Maps',
                'slug' => 'geography-maps',
                'description' => 'The geography of Palestine: historic cities, coastal ports, olive groves, and regional maps.',
                'color' => 'blue',
                'icon' => 'map'
            ],
            [
                'name' => 'Human Rights & Law',
                'slug' => 'human-rights-law',
                'description' => 'International law perspectives, civilian rights, UN resolutions, and humanitarian documentations.',
                'color' => 'red',
                'icon' => 'scale'
            ],
            [
                'name' => 'Educational Guides',
                'slug' => 'educational-guides',
                'description' => 'Academic papers, student guides, infographics, and open-access educational literature.',
                'color' => 'purple',
                'icon' => 'academic-cap'
            ]
        ];

        $categories = [];
        foreach ($categoriesData as $c) {
            $categories[$c['slug']] = Category::firstOrCreate(['slug' => $c['slug']], $c);
        }

        // 3. Articles
        $articles = [
            [
                'title' => 'The Rich Architectural History of Old City Jerusalem and Al-Aqsa Sanctuary',
                'slug' => 'architectural-history-old-city-jerusalem-al-aqsa',
                'excerpt' => 'An in-depth study of the Umayyad, Mamluk, and Ottoman architectural masterpieces that define the skyline of historic Jerusalem.',
                'content' => 'Jerusalem (Al-Quds) stands as one of the most historically significant urban sanctuaries in human history. Its stone walls, domed roofs, and narrow cobblestone alleys tell stories spanning thousands of years. At the focal point of its skyline is the Al-Aqsa Compound (Al-Haram Al-Sharif), spanning over 144,000 square meters. Built initially during the Umayyad dynasty under Caliph Abd al-Malik ibn Marwan in the late 7th century, the Dome of the Rock features majestic octagonal geometry, golden tiles, and exquisite Arabic calligraphy. Over successive centuries, Mamluk architects added intricate vaulted corridors, public fountains (Sabil), and madrasas that created the iconic aesthetic of the Old City today.',
                'thumbnail' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=900',
                'category_id' => $categories['history-heritage']->id,
                'user_id' => $admin->id,
                'status' => 'published',
                'is_featured' => true,
                'views' => 1420,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Tatreez: The Living Art and Visual Language of Palestinian Embroidery',
                'slug' => 'tatreez-living-art-visual-language-palestinian-embroidery',
                'excerpt' => 'Discover how traditional Palestinian embroidery patterns encode history, geography, village identity, and botanical motifs in cross-stitch art.',
                'content' => 'Recognized by UNESCO as Intangible Cultural Heritage, Tatreez is far more than a decorative craft—it is a visual diary woven by generations of Palestinian women. Each region and village developed its own distinct motifs, color palettes, and garment cuts. For example, dresses from Ramallah frequently featured red cross-stitch on local linen with palm branch patterns, while Bethlehem garments utilized couchment embroidery (Tahriri) with metallic threads. Motifs such as the Cypress tree, Moon of Bethlehem, and Olive Branch convey stories of agricultural life, family lineage, and deep attachment to the land.',
                'thumbnail' => 'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?w=900',
                'category_id' => $categories['culture-arts']->id,
                'user_id' => $admin->id,
                'status' => 'published',
                'is_featured' => false,
                'views' => 980,
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Historical Ports of Palestine: Jaffa, Haifa, and Akko on the Mediterranean',
                'slug' => 'historical-ports-palestine-jaffa-haifa-akko',
                'excerpt' => 'Exploring the maritime trade legacy, orange groves, and coastal fortresses of historic Palestinian port cities.',
                'content' => 'For millennia, the coast of Palestine served as a primary gateway linking the Mediterranean world with trade routes across Asia and Africa. Jaffa (Yafa), known poetically as the "Bride of the Sea", was famous worldwide in the 19th and early 20th centuries for exporting millions of crates of Jaffa oranges. Further north, Akko (Acre) retains its massive sea walls built by Daher al-Omar and Jezzar Pasha that resisted Napoleon Bonaparte’s siege in 1799. Meanwhile, Haifa grew rapidly around Mount Carmel as a modern port and railway terminus.',
                'thumbnail' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=900',
                'category_id' => $categories['geography-maps']->id,
                'user_id' => $admin->id,
                'status' => 'published',
                'is_featured' => false,
                'views' => 760,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'The Significance of Olive Trees in Palestinian Agriculture and Cultural Identity',
                'slug' => 'significance-olive-trees-palestinian-agriculture-culture',
                'excerpt' => 'How centuries-old olive groves represent economic sustenance, family tradition, and deep connection to Palestinian soil.',
                'content' => 'Olive trees in Palestine are not merely agricultural crops; they are symbols of peace, endurance, and intergenerational memory. Many ancient trees, known locally as "Rumi olives", have yielded harvests for over a thousand years. The annual autumn harvest season (Al-Zaytoun) brings entire extended families together to pick olives, press cold olive oil, and prepare traditional cured olives. Olive oil forms the cornerstone of Palestinian cuisine, from Za’atar dip to Nabulsi soap production.',
                'thumbnail' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=900',
                'category_id' => $categories['culture-arts']->id,
                'user_id' => $admin->id,
                'status' => 'published',
                'is_featured' => false,
                'views' => 1100,
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'Understanding International Humanitarian Law Frameworks in Palestine',
                'slug' => 'understanding-international-humanitarian-law-frameworks-palestine',
                'excerpt' => 'An educational summary of Fourth Geneva Convention provisions, UN resolutions, and legal protections for civilian populations.',
                'content' => 'International Humanitarian Law (IHL), particularly the Fourth Geneva Convention of 1949, sets forth fundamental rules governing protection of civilians during armed conflicts and foreign occupation. Key provisions mandate the preservation of public infrastructure, schools, medical facilities, and prohibit collective punishment or displacement of civilian populations. This educational article reviews the legal consensus established by the International Court of Justice (ICJ) and various UN bodies regarding human rights protections.',
                'thumbnail' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=900',
                'category_id' => $categories['human-rights-law']->id,
                'user_id' => $admin->id,
                'status' => 'published',
                'is_featured' => false,
                'views' => 640,
                'published_at' => now()->subDays(18),
            ],
            [
                'title' => 'Palestine Educational Curriculum & Archival Preservation Guide',
                'slug' => 'palestine-educational-curriculum-archival-preservation-guide',
                'excerpt' => 'Tools, methodologies, and open-access resources for educators, researchers, and students studying Middle Eastern history.',
                'content' => 'Comprehensive education is essential for preserving historical truth and fostering global understanding. This guide outlines verified primary historical sources, digital museum archives, interactive timelines, and recommended literature for high school and university level research into Palestinian history and culture.',
                'thumbnail' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=900',
                'category_id' => $categories['educational-guides']->id,
                'user_id' => $admin->id,
                'status' => 'published',
                'is_featured' => false,
                'views' => 510,
                'published_at' => now()->subDays(22),
            ],
        ];

        foreach ($articles as $art) {
            Article::firstOrCreate(['slug' => $art['slug']], $art);
        }

        // 4. Timeline Events
        $timelineEvents = [
            [
                'title' => 'Balfour Declaration & Mandate Era Begins',
                'slug' => 'balfour-declaration-1917',
                'era' => 'Ottoman & British Mandate (1917-1947)',
                'year' => 1917,
                'date_display' => 'November 2, 1917',
                'location' => 'London / Palestine',
                'description' => 'The British government issued the Balfour Declaration, initiating three decades of British Mandatory rule over Palestine.',
                'details' => 'Following World War I and the collapse of the Ottoman Empire, the League of Nations formally granted Britain the Mandate for Palestine in 1922.',
                'image_url' => 'images/timeline/balfour-declaration-1917.jpg',
                'impact_level' => 'Historical Turning Point',
                'is_key_event' => true,
            ],
            [
                'title' => 'UN Partition Plan (Resolution 181)',
                'slug' => 'un-partition-plan-1947',
                'era' => 'Ottoman & British Mandate (1917-1947)',
                'year' => 1947,
                'date_display' => 'November 29, 1947',
                'location' => 'UN General Assembly, New York',
                'description' => 'The United Nations General Assembly recommended partition of Mandatory Palestine into two states.',
                'details' => 'UN Resolution 181 proposed dividing Palestine while designating Jerusalem as an international corpus separatum under UN administration.',
                'image_url' => 'images/timeline/un-partition-plan-1947.jpg',
                'impact_level' => 'High',
                'is_key_event' => true,
            ],
            [
                'title' => 'The Nakba (Catastrophe) of 1948',
                'slug' => 'the-nakba-1948',
                'era' => 'Nakba & Partition (1948-1966)',
                'year' => 1948,
                'date_display' => 'May 15, 1948',
                'location' => 'Across Palestine',
                'description' => 'Over 700,000 Palestinians were displaced from their ancestral homes and over 500 villages were depopulated.',
                'details' => 'May 15 is commemorated annually by Palestinians worldwide as Nakba Day, honoring memory, displaced communities, and legal right of return under UN Resolution 194.',
                'image_url' => 'images/timeline/the-nakba-1948.jpg',
                'impact_level' => 'Historical Turning Point',
                'is_key_event' => true,
            ],
            [
                'title' => 'The 1967 War (Al-Naksah)',
                'slug' => 'six-day-war-1967',
                'era' => '1967 War & Occupation (1967-1986)',
                'year' => 1967,
                'date_display' => 'June 5-10, 1967',
                'location' => 'Gaza, West Bank, East Jerusalem',
                'description' => 'Military occupation of the West Bank, East Jerusalem, Gaza Strip, Sinai Peninsula, and Golan Heights.',
                'details' => 'The United Nations Security Council passed landmark Resolution 242 calling for withdrawal of armed forces from occupied territories and just settlement of refugee issues.',
                'image_url' => 'images/timeline/six-day-war-1967.jpg',
                'impact_level' => 'Historical Turning Point',
                'is_key_event' => true,
            ],
            [
                'title' => 'First Intifada (Uprising of Stones)',
                'slug' => 'first-intifada-1987',
                'era' => 'Intifadas & Peace Process (1987-2005)',
                'year' => 1987,
                'date_display' => 'December 8, 1987',
                'location' => 'Gaza & West Bank',
                'description' => 'Widespread grass-roots civilian protests, general strikes, civil disobedience, and boycott movements across Palestine.',
                'details' => 'The First Intifada brought global international awareness to living conditions under occupation and led to negotiations resulting in the Oslo Accords of 1993.',
                'image_url' => 'images/timeline/first-intifada-1987.jpg',
                'impact_level' => 'High',
                'is_key_event' => true,
            ],
            [
                'title' => 'UNESCO Inscribes Palestinian Cultural Heritage Items',
                'slug' => 'unesco-palestinian-heritage-2021',
                'era' => 'Contemporary Era (2006-Present)',
                'year' => 2021,
                'date_display' => 'December 2021',
                'location' => 'Paris / Palestine',
                'description' => 'UNESCO officially inscribed Tatreez embroidery and traditional craftsmanship on the Representative List of Intangible Cultural Heritage of Humanity.',
                'details' => 'International recognition reinforced global protection and celebration of Palestinian artistic heritage.',
                'image_url' => 'images/cities/ramallah.jpg',
                'impact_level' => 'Medium',
                'is_key_event' => false,
            ],
            [
                'title' => 'Global Solidarity Movements and ICJ Advisory Proceedings',
                'slug' => 'global-solidarity-icj-2024',
                'era' => 'Contemporary Era (2006-Present)',
                'year' => 2024,
                'date_display' => '2024 - Present',
                'location' => 'International Court of Justice, The Hague',
                'description' => 'Unprecedented worldwide mobilization and ICJ advisory opinion reaffirming the illegality of prolonged territorial annexations.',
                'details' => 'Millions around the world participated in educational forums, cultural exhibitions, and legal advocacy.',
                'image_url' => 'images/dome-of-rock.jpg',
                'impact_level' => 'High',
                'is_key_event' => true,
            ]
        ];

        foreach ($timelineEvents as $event) {
            TimelineEvent::updateOrCreate(['slug' => $event['slug']], $event);
        }

        // 5. Gallery Items - Historical Event & Landmark Archive
        $galleryItems = [
            [
                'title' => 'The Balfour Declaration Document (1917)',
                'category' => 'Historical Events',
                'media_type' => 'image',
                'media_url' => 'images/timeline/balfour-declaration-1917.jpg',
                'caption' => 'Official letter issued on November 2, 1917, by Arthur Balfour establishing British policy in Mandatory Palestine.',
                'year' => 1917,
                'views' => 1890,
            ],
            [
                'title' => 'United Nations Partition Plan Map (1947)',
                'category' => 'Historical Events',
                'media_type' => 'image',
                'media_url' => 'images/timeline/un-partition-plan-1947.jpg',
                'caption' => 'Historical map illustrating UN Resolution 181 partition proposal for Jewish, Arab, and Jerusalem international zones.',
                'year' => 1947,
                'views' => 1640,
            ],
            [
                'title' => 'The Nakba - Mass Displacement (1948)',
                'category' => 'Historical Events',
                'media_type' => 'image',
                'media_url' => 'images/timeline/the-nakba-1948.jpg',
                'caption' => 'Infographic and photo documentation of the 1948 Catastrophe, displacing over 700,000 Palestinians.',
                'year' => 1948,
                'views' => 2100,
            ],
            [
                'title' => 'Military Occupation & Six-Day War (1967)',
                'category' => 'Historical Events',
                'media_type' => 'image',
                'media_url' => 'images/timeline/six-day-war-1967.jpg',
                'caption' => 'Archival photograph depicting military armor during the June 1967 war in the West Bank and Gaza Strip.',
                'year' => 1967,
                'views' => 1450,
            ],
            [
                'title' => 'First Intifada Grassroots Protests (1987)',
                'category' => 'Historical Events',
                'media_type' => 'image',
                'media_url' => 'images/timeline/first-intifada-1987.jpg',
                'caption' => 'Civilian demonstrations and youth resistance during the First Intifada uprising across Gaza and the West Bank.',
                'year' => 1987,
                'views' => 1720,
            ],
            [
                'title' => 'Dome of the Rock & Al-Aqsa Sanctuary',
                'category' => 'Historical Landmarks',
                'media_type' => 'image',
                'media_url' => 'images/dome-of-rock.jpg',
                'caption' => 'Panoramic view of the golden Dome of the Rock in Jerusalem, built during the 7th century Umayyad period.',
                'year' => 2023,
                'views' => 2400,
            ],
            [
                'title' => 'Old City Jerusalem Landscape',
                'category' => 'Historical Landmarks',
                'media_type' => 'image',
                'media_url' => 'images/cities/jerusalem.jpg',
                'caption' => 'Historic stone walls and architectural heritage of Al-Quds (Jerusalem).',
                'year' => 2023,
                'views' => 1520,
            ],
            [
                'title' => 'Ancient Olive Orchards of Ramallah',
                'category' => 'Heritage',
                'media_type' => 'image',
                'media_url' => 'images/cities/ramallah.jpg',
                'caption' => 'Centuries-old olive groves representing deep-rooted connection to Palestinian land.',
                'year' => 2023,
                'views' => 980,
            ],
            [
                'title' => 'Historic Port Gate of Jaffa',
                'category' => 'Historical Landmarks',
                'media_type' => 'image',
                'media_url' => 'images/cities/jaffa.jpg',
                'caption' => 'Ancient maritime port city of Jaffa on the Mediterranean coast.',
                'year' => 2022,
                'views' => 890,
            ],
            [
                'title' => 'Artisan Heritage & Culture in Nablus',
                'category' => 'Culture',
                'media_type' => 'image',
                'media_url' => 'images/cities/nablus.jpg',
                'caption' => 'Traditional Old City market craftsmanship in Nablus.',
                'year' => 2023,
                'views' => 1120,
            ]
        ];

        foreach ($galleryItems as $g) {
            Gallery::updateOrCreate(['title' => $g['title']], $g);
        }

        // 6. Quizzes & Questions
        $quiz = Quiz::firstOrCreate(
            ['slug' => 'palestinian-history-culture-101'],
            [
                'title' => 'Palestinian History & Cultural Heritage 101',
                'category_id' => $categories['history-heritage']->id,
                'description' => 'Test your knowledge on Palestine’s historic landmarks, key historical dates, architectural heritage, and UNESCO cultural art forms.',
                'difficulty' => 'Medium',
                'time_limit_minutes' => 10,
                'pass_score' => 70,
            ]
        );

        $questions = [
            [
                'question' => 'Which city is world-famous for its traditional olive oil soap industry and iconic Knafeh sweet?',
                'options' => ['Jerusalem', 'Nablus', 'Haifa', 'Gaza City'],
                'correct_option' => 1,
                'explanation' => 'Nablus is world-famous for its centuries-old olive oil soap factories (Sabun Nabulsi) and signature Knafeh pastry.'
            ],
            [
                'question' => 'What is the traditional name for Palestinian art of cross-stitch embroidery recognized by UNESCO?',
                'options' => ['Dabke', 'Tatreez', 'Oud', 'Tahriri'],
                'correct_option' => 1,
                'explanation' => 'Tatreez is the traditional Palestinian embroidery art form inscribed on UNESCO Intangible Cultural Heritage list.'
            ],
            [
                'question' => 'Which monumental Umayyad building with a golden dome stands in the Al-Aqsa compound in Jerusalem?',
                'options' => ['Church of the Nativity', 'Dome of the Rock (Qubbat As-Sakhra)', 'Al-Jazzar Mosque', 'Great Mosque of Gaza'],
                'correct_option' => 1,
                'explanation' => 'The Dome of the Rock (Qubbat As-Sakhra) was completed in 691 CE during the Umayyad caliphate.'
            ],
            [
                'question' => 'In which year did the United Nations General Assembly pass Resolution 181 proposing the partition of Palestine?',
                'options' => ['1917', '1947', '1967', '1993'],
                'correct_option' => 1,
                'explanation' => 'UN Resolution 181 was passed on November 29, 1947.'
            ],
            [
                'question' => 'Which historic Palestinian port city was historically renowned as the "Bride of the Sea" for its citrus exports?',
                'options' => ['Jaffa (Yafa)', 'Bethlehem', 'Ramallah', 'Hebron'],
                'correct_option' => 0,
                'explanation' => 'Jaffa (Yafa) was famous as the "Bride of the Sea", exporting millions of citrus crates worldwide.'
            ]
        ];

        foreach ($questions as $q) {
            Question::firstOrCreate(
                ['quiz_id' => $quiz->id, 'question' => $q['question']],
                [
                    'options' => $q['options'],
                    'correct_option' => $q['correct_option'],
                    'explanation' => $q['explanation']
                ]
            );
        }

        // 7. Educational Resources
        $resources = [
            [
                'title' => 'Comprehensive Map & Atlas of Historical Palestine (1880 - Present)',
                'slug' => 'comprehensive-map-atlas-historical-palestine',
                'type' => 'pdf',
                'category_id' => $categories['geography-maps']->id,
                'description' => 'A high-resolution PDF geographical reference atlas showcasing historic city maps, village locations, and demographic developments.',
                'external_url' => 'https://www.un.org/unispal/',
                'author' => 'Palestine Knowledge Research Institute',
                'downloads_count' => 340,
            ],
            [
                'title' => 'Documentary: Voices of Tatreez - Threading History Across Generations',
                'slug' => 'documentary-voices-of-tatreez',
                'type' => 'documentary',
                'category_id' => $categories['culture-arts']->id,
                'description' => 'An open-access documentary film exploring master embroiderers preserving centuries-old motifs.',
                'external_url' => 'https://youtube.com',
                'author' => 'Heritage Cultural Media',
                'downloads_count' => 520,
            ],
            [
                'title' => 'Infographic Guide: Timeline of Key Historical Events in Modern Palestine',
                'slug' => 'infographic-guide-timeline-key-historical-events',
                'type' => 'infographic',
                'category_id' => $categories['history-heritage']->id,
                'description' => 'Visual educational infographic detailing major historical turning points from 1917 to contemporary law.',
                'external_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=1200',
                'author' => 'Education Taskforce',
                'downloads_count' => 780,
            ],
            [
                'title' => 'Academic Paper: Legal Analysis of International Protection Frameworks',
                'slug' => 'academic-paper-legal-analysis-international-protection',
                'type' => 'paper',
                'category_id' => $categories['human-rights-law']->id,
                'description' => 'Peer-reviewed research paper analyzing Fourth Geneva Convention obligations and advisory opinions.',
                'external_url' => 'https://www.icj-cij.org/',
                'author' => 'Prof. S. Al-Husseini',
                'downloads_count' => 290,
            ]
        ];

        foreach ($resources as $res) {
            EducationalResource::firstOrCreate(['slug' => $res['slug']], $res);
        }

        // 8. Seed Real-time News initial items
        app(NewsService::class)->seedInitialNews();
    }
}
