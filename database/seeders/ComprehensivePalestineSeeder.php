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
        Article::query()->delete();

        $articles = [
            [
                'title' => 'The Balfour Declaration of 1917 & The Beginning of British Mandatory Palestine',
                'slug' => 'balfour-declaration-1917-british-mandate',
                'excerpt' => 'A historical analysis of the 1917 Balfour Declaration, its diplomatic background, and its profound impact on 30 years of British Mandatory rule in Palestine.',
                'content' => 'On November 2, 1917, British Foreign Secretary Arthur Balfour authored a official statement to Lord Walter Rothschild. Known as the Balfour Declaration, this letter expressed official British support for the establishment of a "national home for the Jewish people" in Palestine. At the time, Palestine was still under Ottoman rule, with an indigenous Palestinian Arab population comprising over 90% of the inhabitants. Following World War I and the Sykes-Picot Agreement, the League of Nations formally ratified the British Mandate for Palestine in 1922, setting in motion three decades of dramatic political, demographic, and territorial restructuring across the region.',
                'thumbnail' => 'images/timeline/balfour-declaration-1917.jpg',
                'category_id' => $categories['history-heritage']->id,
                'user_id' => $admin->id,
                'status' => 'published',
                'is_featured' => true,
                'views' => 1840,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'UN Resolution 181 (1947) & The Partition Plan of Palestine',
                'slug' => 'un-resolution-181-partition-plan-palestine-1947',
                'excerpt' => 'Understanding United Nations General Assembly Resolution 181, its proposed boundaries, legal controversy, and geopolitical fallout.',
                'content' => 'On November 29, 1947, the United Nations General Assembly passed Resolution 181 by a vote of 33 to 13, recommending the partition of Mandatory Palestine into separate Jewish and Arab states, with an internationalized corpus separatum status for Jerusalem under UN administration. Despite indigenous Palestinian rejection due to allocating 56% of the land to a minority population, Resolution 181 initiated immediate military escalation and signaled the imminent end of the British Mandate on May 14, 1948.',
                'thumbnail' => 'images/timeline/un-partition-plan-1947.jpg',
                'category_id' => $categories['human-rights-law']->id,
                'user_id' => $admin->id,
                'status' => 'published',
                'is_featured' => false,
                'views' => 1250,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'The Nakba of 1948: Mass Displacement and Palestinian Historical Memory',
                'slug' => 'the-nakba-1948-mass-displacement-palestinian-history',
                'excerpt' => 'Documenting the 1948 Catastrophe (Al-Nakba), the depopulation of over 500 villages, and the origin of the Palestinian refugee diaspora.',
                'content' => 'Al-Nakba ("The Catastrophe") refers to the mass expulsion and displacement of over 750,000 Palestinian Arabs from their ancestral towns and villages during the 1948 War. More than 500 Palestinian villages were depopulated or destroyed. Cities such as Jaffa, Haifa, Lydda, Ramle, and West Jerusalem saw vast numbers of residents forced into exile across the West Bank, Gaza Strip, Jordan, Lebanon, and Syria. The Nakba remains the foundational event of modern Palestinian national identity, commemorated annually on May 15.',
                'thumbnail' => 'images/timeline/the-nakba-1948.jpg',
                'category_id' => $categories['history-heritage']->id,
                'user_id' => $admin->id,
                'status' => 'published',
                'is_featured' => false,
                'views' => 2410,
                'published_at' => now()->subDays(8),
            ],
            [
                'title' => 'The 1967 Six-Day War (Al-Naksah) and Occupation of Palestinian Lands',
                'slug' => 'six-day-war-1967-naksah-occupation-palestinian-lands',
                'excerpt' => 'An examination of the June 1967 War, the capture of the West Bank, Gaza Strip, and East Jerusalem, and subsequent UN Security Council Resolution 242.',
                'content' => 'In June 1967, the Six-Day War (Al-Naksah, or "The Setback") dramatically transformed the map of the Middle East. Israel launched pre-emptive strikes and seized control of the West Bank, East Jerusalem, the Gaza Strip, the Syrian Golan Heights, and the Egyptian Sinai Peninsula. Over 300,000 additional Palestinians were displaced. In November 1967, the UN Security Council adopted Resolution 242, emphasizing the "inadmissibility of the acquisition of territory by war" and calling for the withdrawal of armed forces from occupied territories.',
                'thumbnail' => 'images/timeline/six-day-war-1967.jpg',
                'category_id' => $categories['human-rights-law']->id,
                'user_id' => $admin->id,
                'status' => 'published',
                'is_featured' => false,
                'views' => 1630,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'The First Intifada (1987): Popular Resistance and Grassroots Mobilization',
                'slug' => 'first-intifada-1987-popular-resistance-grassroots',
                'excerpt' => 'Exploring the 1987 uprising, popular committees, strikes, civil disobedience, and its role leading to the 1993 Oslo Accords.',
                'content' => 'Triggered in December 1987 in the Jabalia refugee camp in Gaza, the First Intifada ("Uprising") rapidly spread throughout the West Bank and Gaza Strip as a sustained popular movement. Characterized by mass civil disobedience, commercial strikes, boycott of occupied administration products, and civilian demonstrations, the Intifada mobilized all sectors of Palestinian society under local popular committees. The international visibility of the First Intifada led directly to the 1991 Madrid Peace Conference and the 1993 Oslo Accords.',
                'thumbnail' => 'images/timeline/first-intifada-1987.jpg',
                'category_id' => $categories['history-heritage']->id,
                'user_id' => $admin->id,
                'status' => 'published',
                'is_featured' => false,
                'views' => 1490,
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'Architectural Heritage of Old City Jerusalem & Al-Aqsa Compound',
                'slug' => 'architectural-heritage-old-city-jerusalem-al-aqsa',
                'excerpt' => 'An architectural guide to the Umayyad, Mamluk, and Ottoman monuments defining the skyline of historic Al-Quds.',
                'content' => 'Jerusalem (Al-Quds Al-Shareef) is home to one of the world\'s most sacred urban landscapes. The Al-Aqsa Compound (Al-Haram Al-Sharif), covering 144 dunams, includes the iconic golden-domed Dome of the Rock (built 691 CE under Umayyad Caliph Abd al-Malik) and Al-Qibli Mosque. Mamluk and Ottoman architectural additions feature exquisite stone carvings, vaulted suqs, arched gates (Bab al-Amud / Damascus Gate), and historic madrasas that showcase centuries of artistic excellence.',
                'thumbnail' => 'images/dome-of-rock.jpg',
                'category_id' => $categories['culture-arts']->id,
                'user_id' => $admin->id,
                'status' => 'published',
                'is_featured' => false,
                'views' => 1980,
                'published_at' => now()->subDays(18),
            ],
            [
                'title' => 'Historic Coastal Ports: Jaffa, Haifa, and Akko on the Mediterranean',
                'slug' => 'historic-coastal-ports-jaffa-haifa-akko',
                'excerpt' => 'Maritime trade legacy, orange exports, and historic sea fortresses along the Mediterranean coast of Palestine.',
                'content' => 'For centuries, the coastal cities of Palestine served as vital maritime hubs connecting the Levant to Europe and Africa. Jaffa (Yafa), the ancient "Bride of the Sea", was renowned worldwide in the 19th and early 20th century for exporting millions of crates of famous Jaffa oranges. Akko (Acre) retains formidable Ottoman sea walls that repelled Napoleon in 1799, while Haifa grew into a modern commercial port and rail terminal along Mount Carmel.',
                'thumbnail' => 'images/cities/jaffa.jpg',
                'category_id' => $categories['geography-maps']->id,
                'user_id' => $admin->id,
                'status' => 'published',
                'is_featured' => false,
                'views' => 1120,
                'published_at' => now()->subDays(20),
            ],
            [
                'title' => 'Tatreez: The Living Art and Cultural Memory of Palestinian Embroidery',
                'slug' => 'tatreez-living-art-cultural-memory-palestinian-embroidery',
                'excerpt' => 'UNESCO-recognized traditional embroidery encoding village identity, botanical motifs, and oral history in needlework.',
                'content' => 'Recognized by UNESCO as Intangible Cultural Heritage of Humanity, Tatreez cross-stitch embroidery is a living visual language. Palestinian women historically stitched intricate motifs on handmade thobes (dresses), with colors and patterns indicating the wearer\'s hometown—Ramallah, Hebron, Bethlehem, or Gaza. Key motifs like the Cypress Tree, Olive Leaf, and Moon of Bethlehem symbolize deep agricultural roots and ancestral continuity.',
                'thumbnail' => 'images/cities/ramallah.jpg',
                'category_id' => $categories['culture-arts']->id,
                'user_id' => $admin->id,
                'status' => 'published',
                'is_featured' => false,
                'views' => 1350,
                'published_at' => now()->subDays(25),
            ],
        ];

        foreach ($articles as $art) {
            Article::create($art);
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
            ],
            [
                'title' => 'Church of the Nativity in Bethlehem',
                'category' => 'Historical Landmarks',
                'media_type' => 'image',
                'media_url' => 'images/cities/bethlehem.jpg',
                'caption' => 'One of the oldest continuously operating Christian churches in the world, located in Bethlehem.',
                'year' => 2023,
                'views' => 1340,
            ],
            [
                'title' => 'Coastal Horizon of Gaza Port',
                'category' => 'Heritage',
                'media_type' => 'image',
                'media_url' => 'images/cities/gaza.jpg',
                'caption' => 'Mediterranean coastline and historical fishing heritage along Gaza city.',
                'year' => 2023,
                'views' => 1560,
            ],
            [
                'title' => 'Slopes of Mount Carmel and Haifa Port',
                'category' => 'Historical Landmarks',
                'media_type' => 'image',
                'media_url' => 'images/cities/haifa.jpg',
                'caption' => 'Historic coastal port and terraced gardens of Haifa.',
                'year' => 2022,
                'views' => 1210,
            ],
            [
                'title' => 'Ibrahimi Mosque & Old City of Hebron',
                'category' => 'Historical Landmarks',
                'media_type' => 'image',
                'media_url' => 'images/cities/hebron.jpg',
                'caption' => 'Architectural heritage of Al-Khalil (Hebron) and the ancient stone alleys.',
                'year' => 2023,
                'views' => 1480,
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
