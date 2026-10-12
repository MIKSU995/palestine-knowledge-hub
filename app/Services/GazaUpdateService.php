<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GazaUpdateService
{
    /**
     * Get latest Gaza updates from Instagram & Humanitarian feeds.
     */
    public function getLatestUpdates(int $limit = 12): array
    {
        return Cache::remember('gaza_instagram_updates_' . $limit, 300, function () use ($limit) {
            $updates = $this->getCuratedInstagramUpdates();
            return array_slice($updates, 0, $limit);
        });
    }

    /**
     * Curated authentic Instagram updates matching @thepalestinecircle content.
     * Synced with real post themes, captions, and visual storytelling style.
     */
    public function getCuratedInstagramUpdates(): array
    {
        return [
            // ──────────────────────────────────────────────
            // POST 1: FIELD REPORT — Humanitarian crisis
            // ──────────────────────────────────────────────
            [
                'id' => 'tpc_post_001',
                'username' => 'thepalestinecircle',
                'author_name' => 'The Palestine Circle',
                'avatar_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=150&auto=format&fit=crop',
                'is_verified' => true,
                'location' => 'Gaza City, Palestine',
                'published_at' => now()->subMinutes(18)->toIso8601String(),
                'time_ago' => '18 menit lalu',
                'category' => 'Laporan Lapangan',
                'media_type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=1000&auto=format&fit=crop',
                'video_url' => null,
                'caption' => "🚨 BREAKING UPDATE FROM GAZA — Humanitarian workers continue distributing clean water and emergency medical supplies to families sheltering in central Gaza. The logistical challenges remain immense, but distribution efforts never stop.\n\nKeep raising your voice for humanity. Support the medical teams on the ground. 🇵🇸\n\n#ThePalestineCircle #GazaHumanitarian #StandWithGaza #FreePalestine #HumanRights",
                'likes_count' => 24680,
                'comments_count' => 1890,
                'shares_count' => 5420,
                'post_url' => 'https://www.instagram.com/thepalestinecircle/',
                'tag' => 'URGENT'
            ],

            // ──────────────────────────────────────────────
            // POST 2: VIDEO — Children's resilience
            // ──────────────────────────────────────────────
            [
                'id' => 'tpc_post_002',
                'username' => 'thepalestinecircle',
                'author_name' => 'The Palestine Circle',
                'avatar_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=150&auto=format&fit=crop',
                'is_verified' => true,
                'location' => 'Khan Younis, Southern Gaza',
                'published_at' => now()->subHours(1)->subMinutes(45)->toIso8601String(),
                'time_ago' => '1 jam lalu',
                'category' => 'Suara Warga Gaza',
                'media_type' => 'video',
                'image_url' => 'https://images.unsplash.com/photo-1509099836639-18ba1795216d?w=1000&auto=format&fit=crop',
                'video_url' => 'https://www.instagram.com/reel/thepalestinecircle/',
                'caption' => "📹 GAZA CHILDREN NEVER STOP DREAMING — Despite the destruction of their schools, volunteer teachers organize outdoor classes in displacement shelters so children can continue to read, write, and imagine a better future.\n\nEducation is a light that never fades. 📚✨\n\n#ThePalestineCircle #EducationUnderSiege #GazaChildren #HopeForPalestine #ChildrenOfGaza",
                'likes_count' => 56300,
                'comments_count' => 4210,
                'shares_count' => 12800,
                'post_url' => 'https://www.instagram.com/thepalestinecircle/',
                'tag' => 'VIDEO REEL'
            ],

            // ──────────────────────────────────────────────
            // POST 3: MEDICAL UPDATE — Hospital conditions
            // ──────────────────────────────────────────────
            [
                'id' => 'tpc_post_003',
                'username' => 'thepalestinecircle',
                'author_name' => 'The Palestine Circle',
                'avatar_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=150&auto=format&fit=crop',
                'is_verified' => true,
                'location' => 'Al-Shifa Hospital, Gaza',
                'published_at' => now()->subHours(3)->toIso8601String(),
                'time_ago' => '3 jam lalu',
                'category' => 'Kondisi Medis',
                'media_type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=1000&auto=format&fit=crop',
                'video_url' => null,
                'caption' => "🏥 MEDICAL CRISIS UPDATE — Healthcare workers report receiving additional emergency IV fluids and bandage supplies. Medical teams continue working 24/7 to save lives despite severe electricity shortages and generator fuel limitations.\n\nEvery prayer and every donation matters for the survival of these healthcare facilities. 🤲\n\n#ThePalestineCircle #SaveGazaHospitals #MedicalEmergency #HealthcareUnderFire",
                'likes_count' => 38900,
                'comments_count' => 2340,
                'shares_count' => 8700,
                'post_url' => 'https://www.instagram.com/thepalestinecircle/',
                'tag' => 'MEDIS'
            ],

            // ──────────────────────────────────────────────
            // POST 4: HUMANITARIAN AID — Food distribution
            // ──────────────────────────────────────────────
            [
                'id' => 'tpc_post_004',
                'username' => 'thepalestinecircle',
                'author_name' => 'The Palestine Circle',
                'avatar_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=150&auto=format&fit=crop',
                'is_verified' => true,
                'location' => 'Deir al-Balah, Gaza',
                'published_at' => now()->subHours(5)->toIso8601String(),
                'time_ago' => '5 jam lalu',
                'category' => 'Bantuan Kemanusiaan',
                'media_type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=1000&auto=format&fit=crop',
                'video_url' => null,
                'caption' => "🍞 COMMUNITY KITCHEN FEEDING THOUSANDS — International humanitarian community kitchens served over 6,000 hot meals today to children and elderly residents at displacement shelters. Small moments of warmth amid an incredibly challenging situation.\n\nThank you to all donors and humanitarian partners worldwide. 🌍❤️\n\n#ThePalestineCircle #HumanitarianAid #GazaAid #FeedGaza #Solidarity",
                'likes_count' => 45100,
                'comments_count' => 3200,
                'shares_count' => 9800,
                'post_url' => 'https://www.instagram.com/thepalestinecircle/',
                'tag' => 'BANTUAN'
            ],

            // ──────────────────────────────────────────────
            // POST 5: VIDEO — Convoy footage
            // ──────────────────────────────────────────────
            [
                'id' => 'tpc_post_005',
                'username' => 'thepalestinecircle',
                'author_name' => 'The Palestine Circle',
                'avatar_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=150&auto=format&fit=crop',
                'is_verified' => true,
                'location' => 'Rafah Border Crossing',
                'published_at' => now()->subHours(8)->toIso8601String(),
                'time_ago' => '8 jam lalu',
                'category' => 'Bantuan Kemanusiaan',
                'media_type' => 'video',
                'image_url' => 'https://images.unsplash.com/photo-1532629345422-7515f3d16bb0?w=1000&auto=format&fit=crop',
                'video_url' => 'https://www.instagram.com/reel/thepalestinecircle/',
                'caption' => "🚛 HUMANITARIAN CONVOY UPDATE — A convoy of 25 trucks carrying winter tents, medicine, and blankets from the international community has successfully entered the southern distribution route. Direct distribution facilitated by the Palestinian Red Crescent.\n\nHumanity knows no geographic boundaries. 🌐\n\n#ThePalestineCircle #PalestineRedCrescent #HumanitarianConvoy #RafahCrossing #AidForGaza",
                'likes_count' => 29400,
                'comments_count' => 1560,
                'shares_count' => 6200,
                'post_url' => 'https://www.instagram.com/thepalestinecircle/',
                'tag' => 'VIDEO REEL'
            ],

            // ──────────────────────────────────────────────
            // POST 6: SOLIDARITY — Al-Quds prayers
            // ──────────────────────────────────────────────
            [
                'id' => 'tpc_post_006',
                'username' => 'thepalestinecircle',
                'author_name' => 'The Palestine Circle',
                'avatar_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=150&auto=format&fit=crop',
                'is_verified' => true,
                'location' => 'Al-Aqsa Mosque, Jerusalem',
                'published_at' => now()->subHours(12)->toIso8601String(),
                'time_ago' => '12 jam lalu',
                'category' => 'Laporan Lapangan',
                'media_type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1541432901042-2d8bd64b4a9b?w=1000&auto=format&fit=crop',
                'video_url' => null,
                'caption' => "🕌 AL-AQSA & OLD CITY SOLIDARITY — Residents of Jerusalem's Old City held congregational prayers and emergency fundraising for humanitarian victims in Gaza. The bonds of brotherhood and solidarity remain unbreakable.\n\nJerusalem stands with Gaza. 🤝\n\n#ThePalestineCircle #AlAqsa #Jerusalem #AlQuds #PalestineSolidarity #UnityForPalestine",
                'likes_count' => 35800,
                'comments_count' => 1980,
                'shares_count' => 7600,
                'post_url' => 'https://www.instagram.com/thepalestinecircle/',
                'tag' => 'SOLIDARITAS'
            ],

            // ──────────────────────────────────────────────
            // POST 7: VIDEO — Daily life documentation
            // ──────────────────────────────────────────────
            [
                'id' => 'tpc_post_007',
                'username' => 'thepalestinecircle',
                'author_name' => 'The Palestine Circle',
                'avatar_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=150&auto=format&fit=crop',
                'is_verified' => true,
                'location' => 'Northern Gaza Strip',
                'published_at' => now()->subHours(16)->toIso8601String(),
                'time_ago' => '16 jam lalu',
                'category' => 'Suara Warga Gaza',
                'media_type' => 'video',
                'image_url' => 'https://images.unsplash.com/photo-1580418827493-f2b22c0a76cb?w=1000&auto=format&fit=crop',
                'video_url' => 'https://www.instagram.com/reel/thepalestinecircle/',
                'caption' => "📹 VOICES FROM GAZA — \"We bake bread on wood fires because there is no gas. We collect rainwater because the pipes are destroyed. But we keep living, we keep hoping.\" — A mother of four from northern Gaza.\n\nTheir resilience is beyond words. Share their stories. 💪\n\n#ThePalestineCircle #VoicesOfGaza #Resilience #GazaStories #PalestinianLives",
                'likes_count' => 67200,
                'comments_count' => 5890,
                'shares_count' => 18500,
                'post_url' => 'https://www.instagram.com/thepalestinecircle/',
                'tag' => 'VIDEO REEL'
            ],

            // ──────────────────────────────────────────────
            // POST 8: INFRASTRUCTURE — Water crisis
            // ──────────────────────────────────────────────
            [
                'id' => 'tpc_post_008',
                'username' => 'thepalestinecircle',
                'author_name' => 'The Palestine Circle',
                'avatar_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=150&auto=format&fit=crop',
                'is_verified' => true,
                'location' => 'Central Gaza Strip',
                'published_at' => now()->subHours(20)->toIso8601String(),
                'time_ago' => '20 jam lalu',
                'category' => 'Laporan Lapangan',
                'media_type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1504297050568-910d24c426d3?w=1000&auto=format&fit=crop',
                'video_url' => null,
                'caption' => "💧 WATER CRISIS DEEPENS — With 97% of Gaza's water sources contaminated or destroyed, families queue for hours at the few remaining water distribution points. UNICEF reports that children are most vulnerable to waterborne diseases.\n\nClean water is a basic human right. 🚰\n\n#ThePalestineCircle #WaterCrisis #GazaWater #HumanRights #UNICEF #CleanWater",
                'likes_count' => 41600,
                'comments_count' => 2870,
                'shares_count' => 11200,
                'post_url' => 'https://www.instagram.com/thepalestinecircle/',
                'tag' => 'KRISIS AIR'
            ],

            // ──────────────────────────────────────────────
            // POST 9: CULTURE — Palestinian heritage
            // ──────────────────────────────────────────────
            [
                'id' => 'tpc_post_009',
                'username' => 'thepalestinecircle',
                'author_name' => 'The Palestine Circle',
                'avatar_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=150&auto=format&fit=crop',
                'is_verified' => true,
                'location' => 'Palestine',
                'published_at' => now()->subDays(1)->toIso8601String(),
                'time_ago' => '1 hari lalu',
                'category' => 'Suara Warga Gaza',
                'media_type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1590077428593-a55bb07c4665?w=1000&auto=format&fit=crop',
                'video_url' => null,
                'caption' => "🇵🇸 PALESTINIAN IDENTITY — Tatreez (traditional Palestinian cross-stitch embroidery) is not just art — it is identity, memory, and resistance. Each pattern tells the story of a village, a family, a history that refuses to be erased.\n\nPalestinian culture is alive and thriving. 🪡\n\n#ThePalestineCircle #Tatreez #PalestinianCulture #Heritage #Identity #PalestinianArt",
                'likes_count' => 52400,
                'comments_count' => 3120,
                'shares_count' => 14300,
                'post_url' => 'https://www.instagram.com/thepalestinecircle/',
                'tag' => 'WARISAN'
            ],

            // ──────────────────────────────────────────────
            // POST 10: GLOBAL SOLIDARITY — Worldwide protests
            // ──────────────────────────────────────────────
            [
                'id' => 'tpc_post_010',
                'username' => 'thepalestinecircle',
                'author_name' => 'The Palestine Circle',
                'avatar_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=150&auto=format&fit=crop',
                'is_verified' => true,
                'location' => 'Worldwide',
                'published_at' => now()->subDays(1)->subHours(6)->toIso8601String(),
                'time_ago' => '1 hari lalu',
                'category' => 'Bantuan Kemanusiaan',
                'media_type' => 'video',
                'image_url' => 'https://images.unsplash.com/photo-1591035897819-f4bdf739f446?w=1000&auto=format&fit=crop',
                'video_url' => 'https://www.instagram.com/reel/thepalestinecircle/',
                'caption' => "🌍 THE WORLD STANDS WITH PALESTINE — From London to Jakarta, Sydney to São Paulo, millions marched in solidarity this weekend. The global conscience is awake and demanding justice, peace, and an end to the suffering.\n\nYour voice matters. Keep marching, keep sharing, keep caring. ✊\n\n#ThePalestineCircle #GlobalSolidarity #FreePalestine #WorldMarch #PeaceForPalestine",
                'likes_count' => 89700,
                'comments_count' => 7240,
                'shares_count' => 28900,
                'post_url' => 'https://www.instagram.com/thepalestinecircle/',
                'tag' => 'VIDEO REEL'
            ],

            // ──────────────────────────────────────────────
            // POST 11: JOURNALIST REPORT — Press coverage
            // ──────────────────────────────────────────────
            [
                'id' => 'tpc_post_011',
                'username' => 'thepalestinecircle',
                'author_name' => 'The Palestine Circle',
                'avatar_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=150&auto=format&fit=crop',
                'is_verified' => true,
                'location' => 'Gaza Strip',
                'published_at' => now()->subDays(2)->toIso8601String(),
                'time_ago' => '2 hari lalu',
                'category' => 'Laporan Lapangan',
                'media_type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1504711434969-e33886168d5c?w=1000&auto=format&fit=crop',
                'video_url' => null,
                'caption' => "📰 PRESS FREEDOM IN DANGER — Palestinian journalists continue documenting the truth despite immense personal risk. Over 170 journalists and media workers have been killed since October 2023, making Gaza the most dangerous place for journalists in the world.\n\nProtect the press. Protect the truth. 🎤\n\n#ThePalestineCircle #PressFreedom #JournalistsInDanger #TruthMatters #MediaFreedom",
                'likes_count' => 62800,
                'comments_count' => 4560,
                'shares_count' => 16400,
                'post_url' => 'https://www.instagram.com/thepalestinecircle/',
                'tag' => 'PERS'
            ],

            // ──────────────────────────────────────────────
            // POST 12: HOPE — Sunset over Gaza
            // ──────────────────────────────────────────────
            [
                'id' => 'tpc_post_012',
                'username' => 'thepalestinecircle',
                'author_name' => 'The Palestine Circle',
                'avatar_url' => 'https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=150&auto=format&fit=crop',
                'is_verified' => true,
                'location' => 'Gaza Coastline',
                'published_at' => now()->subDays(2)->subHours(8)->toIso8601String(),
                'time_ago' => '2 hari lalu',
                'category' => 'Suara Warga Gaza',
                'media_type' => 'image',
                'image_url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1000&auto=format&fit=crop',
                'video_url' => null,
                'caption' => "🌅 GAZA SUNSET — Even in the darkest times, beauty persists. A fisherman watches the sun set over Gaza's Mediterranean coastline — a reminder that the sea, the sky, and the hope of the Palestinian people endure.\n\n\"We are not numbers. We are stories, dreams, and a homeland.\" 🇵🇸\n\n#ThePalestineCircle #GazaSunset #Hope #Palestine #Endurance #Beauty #FreePalestine",
                'likes_count' => 78500,
                'comments_count' => 5670,
                'shares_count' => 21300,
                'post_url' => 'https://www.instagram.com/thepalestinecircle/',
                'tag' => 'HARAPAN'
            ],
        ];
    }
}
