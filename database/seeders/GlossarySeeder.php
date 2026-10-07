<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Glossary;
use Illuminate\Support\Str;

class GlossarySeeder extends Seeder
{
    public function run(): void
    {
        $terms = [
            [
                'term' => 'Nakba',
                'arabic_term' => 'النكبة',
                'category' => 'Sejarah',
                'definition' => 'Istilah bahasa Arab yang berarti "Bencana" atau "Malapetaka", merujuk pada pembersihan etnis dan pengusiran lebih dari 750.000 warga Palestina dari tanah air mereka pada tahun 1948.',
                'description' => 'Tragedi Nakba 1948 menandai penghancuran lebih dari 500 desa dan kota Palestina serta pembentukan negara Israel di atas wilayah Palestina yang diduduki. Peristiwa ini melahirkan krisis pengungsi terbesar dalam sejarah modern yang dampaknya masih berlanjut hingga hari ini.',
                'etymology' => 'Bahasa Arab: Nakba (bencana besar/bencana nasional).'
            ],
            [
                'term' => 'Intifada',
                'arabic_term' => 'الانتفاضة',
                'category' => 'Sejarah',
                'definition' => 'Gerakan perlawanan dan kebangkitan massa rakyat Palestina melawan pendudukan militer Israel.',
                'description' => 'Secara harfiah berarti "melepaskan diri" atau "kebangkitan". Sejarah mencatat dua Intifada utama: Intifada Pertama (1987–1993) yang dikenal dengan perlawanan batu dan mogok massal, serta Intifada Kedua / Intifada Al-Aqsa (2000–2005).',
                'etymology' => 'Bahasa Arab: Nafada (mengibaskan/bangkit berdiri).'
            ],
            [
                'term' => 'Al-Quds',
                'arabic_term' => 'القدس',
                'category' => 'Geografi',
                'definition' => 'Nama bahasa Arab untuk Kota Suci Yerusalem, kota bersejarah yang menjadi ibu kota Palestina.',
                'description' => 'Al-Quds merupakan salah satu kota tertua di dunia yang memiliki makna spiritual sangat tinggi bagi umat Islam (tempat Masjid Al-Aqsa dan Kubah Shakhrah), Kristen (Gereja Makam Kudus), dan Yahudi.',
                'etymology' => 'Bahasa Arab: Al-Quds (Yang Diberkahi / Yang Suci).'
            ],
            [
                'term' => 'Sumud',
                'arabic_term' => 'صمود',
                'category' => 'Budaya',
                'definition' => 'Konsep ketahanan, keteguhan hati, dan sikap pantang menyerah rakyat Palestina dalam mempertahankan tanah air dan identitas mereka.',
                'description' => 'Sumud adalah filosofi hidup warga Palestina untuk tetap bertahan hidup, menanam pohon zaitun, melestarikan budaya, dan menolak pengusiran meskipun berada di bawah tekanan dan pendudukan ketat.',
                'etymology' => 'Bahasa Arab: Sumud (ketabahan dan keteguhan jiwa).'
            ],
            [
                'term' => 'Kuffiyeh',
                'arabic_term' => 'الكوفية',
                'category' => 'Budaya',
                'definition' => 'Syal tradisional khas Palestina berwujud motif jaring ikan dan garis garis hitam-putih yang menjadi simbol perjuangan dan identitas nasional.',
                'description' => 'Kuffiyeh awalnya dipakai oleh para petani Palestina untuk melindungi diri dari terik matahari. Pada Revolusi Arab 1936, Kuffiyeh menjadi lambang persatuan perlawanan Palestina.',
                'etymology' => 'Berasal dari nama kota Kufa di Irak, kini identik dengan busana tradisional Palestina.'
            ],
            [
                'term' => 'Deklarasi Balfour',
                'arabic_term' => 'وعد بلفور',
                'category' => 'Hukum',
                'definition' => 'Surat resmi yang diterbitkan oleh Pemerintah Britania Raya pada 1917 yang mendukung pembentukan "tanda kediaman nasional bagi bangsa Yahudi" di Palestina.',
                'description' => 'Surat dari Menteri Luar Negeri Inggris Arthur Balfour kepada Lord Rothschild ini memicu awal dari proses penjajahan modern dan pengabaian hak politik penduduk asli Palestina.',
                'etymology' => 'Dinamai dari nama Menteri Luar Negeri Inggris Arthur James Balfour (1917).'
            ],
            [
                'term' => 'Naksah',
                'arabic_term' => 'النكسة',
                'category' => 'Sejarah',
                'definition' => 'Istilah bahasa Arab yang berarti "Kemunduran", merujuk pada Perang Enam Hari 1967 di mana Israel menduduki sisa wilayah Palestina (Tepi Barat, Gaza, dan Yerusalem Timur).',
                'description' => 'Peristiwa Naksah 1967 mengakibatkan sekitar 300.000 warga Palestina melarikan diri atau diusir dari rumah mereka dan dimulainya pendudukan militer Israel atas seluruh wilayah Palestina.',
                'etymology' => 'Bahasa Arab: Naksah (kemunduran atau kekalahan).'
            ],
            [
                'term' => 'UNRWA',
                'arabic_term' => 'الأونروا',
                'category' => 'Hukum',
                'definition' => 'Badan Bantuan dan Pekerjaan Perserikatan Bangsa-Bangsa untuk Pengungsi Palestina di Timur Dekat (United Nations Relief and Works Agency).',
                'description' => 'Didirikan oleh PBB pada tahun 1949 untuk memberikan bantuan kemanusiaan, pendidikan, dan layanan kesehatan bagi jutaan pengungsi Palestina terdaftar di Tepi Barat, Gaza, Yordania, Lebanon, dan Suriah.',
                'etymology' => 'Akronim dari United Nations Relief and Works Agency for Palestine Refugees in the Near East.'
            ],
            [
                'term' => 'Tatreez',
                'arabic_term' => 'التطريز',
                'category' => 'Budaya',
                'definition' => 'Seni sulam tradisional khas wanita Palestina yang diakui oleh UNESCO sebagai Warisan Budaya Takbenda Dunia.',
                'description' => 'Tatreez menggunakan motif geometris dan warna-warni benang yang menceritakan asal wilayah, status sosial, dan kisah hidup wanita yang menyulamnya.',
                'etymology' => 'Bahasa Arab: Tatreez (Seni Menyulam).'
            ],
            [
                'term' => 'Masjid Al-Aqsa',
                'arabic_term' => 'المسجد الأقصى',
                'category' => 'Geografi',
                'definition' => 'Kawasan suci seluas 14 hektar di Kota Tua Al-Quds (Yerusalem) yang merupakan kiblat pertama umat Islam dan situs suci ketiga terpenting.',
                'description' => 'Kompleks Al-Aqsa mencakup Masjid Jami Al-Aqsa (berkubah perak), Kubah Shakhrah (Dome of the Rock berkubah emas), serta berbagai bangunan bersejarah Islam.',
                'etymology' => 'Bahasa Arab: Al-Aqsa (Masjid Terjauh).'
            ]
        ];

        foreach ($terms as $t) {
            Glossary::updateOrCreate(
                ['slug' => Str::slug($t['term'])],
                [
                    'term' => $t['term'],
                    'arabic_term' => $t['arabic_term'],
                    'category' => $t['category'],
                    'definition' => $t['definition'],
                    'description' => $t['description'],
                    'etymology' => $t['etymology'],
                ]
            );
        }
    }
}
