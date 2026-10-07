<?php

namespace Database\Seeders;

use App\Models\Culture;
use Illuminate\Database\Seeder;

class CultureSeeder extends Seeder
{
    public function run(): void
    {
        $cultures = [
            // === PAKAIAN & KAIN ===
            [
                'title'        => 'Tatreez (Sulaman Palestina)',
                'arabic_title' => 'التطريز الفلسطيني',
                'category'     => 'Pakaian & Seni',
                'region'       => 'Seluruh Palestina',
                'is_featured'  => true,
                'sort_order'   => 1,
                'image_url'    => 'https://images.unsplash.com/photo-1590736969955-71cc94901144?w=800',
                'description'  => 'Tatreez adalah seni sulaman tangan tradisional Palestina yang telah diakui UNESCO sebagai Warisan Budaya Tak Benda pada tahun 2021.',
                'content'      => 'Setiap desa di Palestina memiliki motif Tatreez yang unik — dari pola Fallahi di desa-desa, hingga motif geometris kota Ramallah dan motif bunga Bethlehem. Warna merah melambangkan kehidupan dan kegembiraan, hitam sebagai kesederhanaan, dan hijau sebagai harapan. Perempuan Palestina telah mewariskan seni ini selama ribuan tahun, menjadikannya simbol perlawanan dan identitas nasional yang kuat.',
            ],
            [
                'title'        => 'Kuffiyeh (Kain Kebangsaan)',
                'arabic_title' => 'الكوفية الفلسطينية',
                'category'     => 'Pakaian & Seni',
                'region'       => 'Seluruh Palestina',
                'is_featured'  => true,
                'sort_order'   => 2,
                'image_url'    => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?w=800',
                'description'  => 'Kuffiyeh adalah syal khas Palestina dengan motif kotak hitam-putih yang menjadi simbol solidaritas dan perlawanan rakyat Palestina di seluruh dunia.',
                'content'      => 'Motif tradisional Kuffiyeh menggambarkan jaringan rute dagang kuno, ombak laut Mediterania, dan pohon zaitun. Pabrik Kuffiyeh terakhir di Palestina berdiri di Hebron dan dijalankan oleh keluarga Hirbawi sejak tahun 1961. Kuffiyeh kini menjadi simbol solidaritas global, dipakai oleh jutaan orang di seluruh dunia sebagai pernyataan dukungan terhadap rakyat Palestina.',
            ],
            [
                'title'        => 'Thobe (Gaun Tradisional)',
                'arabic_title' => 'الثوب الفلسطيني',
                'category'     => 'Pakaian & Seni',
                'region'       => 'Seluruh Palestina',
                'is_featured'  => false,
                'sort_order'   => 3,
                'image_url'    => 'https://images.unsplash.com/photo-1588701984143-51c5ec36e3e1?w=800',
                'description'  => 'Thobe adalah gaun panjang wanita Palestina yang dihiasi sulaman Tatreez. Setiap Thobe adalah karya seni unik yang menceritakan asal daerah pemakainya.',
                'content'      => 'Thobe dari daerah Bethlehem memiliki ciri khas dada berbentuk segitiga dengan sulaman emas dan perak. Thobe Ramallah dikenal dengan motif mawar merah besar, sementara Thobe Gaza menampilkan pola geometris berlapis. Proses membuat satu Thobe bisa memakan waktu berbulan-bulan.',
            ],

            // === KULINER ===
            [
                'title'        => 'Maqluba (Nasi Terbalik)',
                'arabic_title' => 'المقلوبة',
                'category'     => 'Kuliner',
                'region'       => 'Seluruh Palestina',
                'is_featured'  => true,
                'sort_order'   => 4,
                'image_url'    => 'https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?w=800',
                'description'  => 'Maqluba adalah hidangan nasi yang dimasak dengan daging, sayuran, dan rempah, kemudian dibalik saat disajikan. Namanya dalam bahasa Arab berarti "terbalik".',
                'content'      => 'Resep Maqluba diperkirakan sudah ada sejak abad ke-13 dan disebutkan dalam literatur Arab kuno. Setiap keluarga Palestina memiliki resepnya sendiri. Lapisan bawah panci berisi ayam atau daging sapi, diikuti sayuran (terong, kembang kol, kentang), kemudian beras yang dibumbui dengan kayu manis, jintan, dan kapulaga. Saat dibalik, hasilnya adalah menara nasi yang megah.',
            ],
            [
                'title'        => 'Knafeh (Kue Keju Palestina)',
                'arabic_title' => 'الكنافة',
                'category'     => 'Kuliner',
                'region'       => 'Nablus',
                'is_featured'  => true,
                'sort_order'   => 5,
                'image_url'    => 'https://images.unsplash.com/photo-1621236378699-8597faf6a176?w=800',
                'description'  => 'Knafeh Nablus adalah makanan penutup ikonik yang terbuat dari mie tipis crispy, keju asin, dan sirup gula, dihiasi taburan pistachio.',
                'content'      => 'Knafeh Nablus terkenal di seluruh dunia Arab dan sering disebut sebagai "Ratu Makanan Manis". Keju yang digunakan adalah keju Nabulsi putih tawar yang dibuat dari susu domba. Toko Knafeh tertua di Nablus, Nabulsi Sweets, telah beroperasi selama lebih dari 200 tahun. Kota Nablus bahkan mendaftarkan Knafeh sebagai produk dengan indikasi geografis terproteksi.',
            ],
            [
                'title'        => 'Musakhan (Ayam di Atas Roti Tabun)',
                'arabic_title' => 'المسخن',
                'category'     => 'Kuliner',
                'region'       => 'Tepi Barat',
                'is_featured'  => false,
                'sort_order'   => 6,
                'image_url'    => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=800',
                'description'  => 'Musakhan adalah hidangan nasional Palestina yang terdiri dari roti Tabun berlapis bawang karamelisasi, ayam panggang, dan minyak zaitun.',
                'content'      => 'Musakhan adalah pesta panen tradisional. Dibuat saat musim panen zaitun dimulai di Oktober-November, keluarga-keluarga Palestina berkumpul untuk merayakannya dengan memasak Musakhan menggunakan minyak zaitun pertama. Bawang dimasak berjam-jam hingga karamelisasi sempurna, lalu disebarkan di atas roti Tabun yang baru dipanggang bersama ayam bumbu sumac.',
            ],

            // === MUSIK & SENI ===
            [
                'title'        => 'Dabke (Tari Rakyat)',
                'arabic_title' => 'الدبكة الفلسطينية',
                'category'     => 'Seni & Musik',
                'region'       => 'Seluruh Palestina',
                'is_featured'  => true,
                'sort_order'   => 7,
                'image_url'    => 'https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?w=800',
                'description'  => 'Dabke adalah tarian rakyat tradisional Palestina yang dilakukan secara berkelompok dengan hentakan kaki bersamaan, melambangkan persatuan dan kegembiraan komunal.',
                'content'      => 'Dabke biasanya ditampilkan dalam pernikahan dan perayaan. Para penari bergandengan tangan atau berpegangan bahu, dipimpin oleh "Lawih" — penari terdepan yang memimpin gerakan. Kostum Dabke khas Palestina adalah Thobe sulaman untuk wanita dan kemeja dengan sirwal untuk pria. Dabke telah menjadi simbol perlawanan — pertunjukan Dabke di pengungsian dan di diaspora adalah cara mempertahankan identitas budaya.',
            ],
            [
                'title'        => 'Musik Maqam & Puisi Oral',
                'arabic_title' => 'المقام الفلسطيني',
                'category'     => 'Seni & Musik',
                'region'       => 'Seluruh Palestina',
                'is_featured'  => false,
                'sort_order'   => 8,
                'image_url'    => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?w=800',
                'description'  => 'Musik tradisional Palestina menggunakan sistem Maqam Arab dengan alat musik Oud, Qanun, Darbuka, dan Mijwiz (seruling bambu).',
                'content'      => 'Mahmoud Darwish, penyair nasional Palestina, menggabungkan tradisi musik Maqam dengan puisi modern. Lagu-lagu perjuangan seperti "Biladi" dan "Unadikum" telah menjadi himne solidaritas. Musisi Palestina seperti Marcel Khalife memperkenalkan musik Palestina ke panggung internasional. Festival musik seperti Palestine Music Expo terus digelar untuk mempromosikan budaya musik Palestina.',
            ],
            [
                'title'        => 'Seni Kaligrafi Arab',
                'arabic_title' => 'الخط العربي الفلسطيني',
                'category'     => 'Seni & Musik',
                'region'       => 'Jerusalem',
                'is_featured'  => false,
                'sort_order'   => 9,
                'image_url'    => 'https://images.unsplash.com/photo-1596008194705-2091cd6764d4?w=800',
                'description'  => 'Tradisi kaligrafi Arab di Jerusalem dan Palestina memiliki sejarah lebih dari 1.400 tahun, menghiasi masjid-masjid bersejarah termasuk Kubah Batu.',
                'content'      => 'Kaligrafi pada Kubah Batu (Qubbat al-Sakhrah) di Jerusalem adalah salah satu contoh kaligrafi Islam paling indah yang masih tersisa. Para kaligrafer Jerusalem menggunakan pena bambu khusus dan tinta alami. Seni kaligrafi juga menghiasi naskah-naskah Al-Quran yang dibuat di Palestina selama berabad-abad dan kini tersimpan di museum-museum dunia.',
            ],

            // === TRADISI ===
            [
                'title'        => 'Musim Panen Zaitun',
                'arabic_title' => 'موسم قطف الزيتون',
                'category'     => 'Tradisi',
                'region'       => 'Seluruh Palestina',
                'is_featured'  => true,
                'sort_order'   => 10,
                'image_url'    => 'https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?w=800',
                'description'  => 'Musim panen zaitun pada Oktober-November adalah tradisi terpenting dalam kehidupan petani Palestina, menjadi momen persatuan keluarga dan komunitas.',
                'content'      => 'Pohon zaitun di Palestina adalah warisan hidup. Beberapa pohon zaitun di Palestina berusia ribuan tahun dan menjadi saksi sejarah. Seluruh anggota keluarga turun ke ladang bersama-sama, menggunakan selimut untuk menampung buah yang jatuh. Minyak zaitun Palestina dari varietas Rumi, Nabali, dan Souri dikenal kualitasnya di seluruh dunia. Setiap tahun, ribuan pohon zaitun ditebang secara ilegal — setiap pohon adalah kehilangan warisan berabad-abad.',
            ],
            [
                'title'        => 'Tradisi Pernikahan Palestina',
                'arabic_title' => 'عرس فلسطيني',
                'category'     => 'Tradisi',
                'region'       => 'Seluruh Palestina',
                'is_featured'  => false,
                'sort_order'   => 11,
                'image_url'    => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800',
                'description'  => 'Pernikahan Palestina adalah perayaan komunal yang berlangsung berhari-hari, diisi dengan Dabke, lagu-lagu tradisional, dan hidangan khas.',
                'content'      => 'Tradisional pernikahan Palestina berlangsung 3-7 hari. Hari pertama disebut "Henna Night" di mana tangan pengantin wanita dihiasi henna dengan motif indah. Prosesi pengantin pria diiringi musik dan tarian Dabke. Hidangan utama adalah Mansaf — nasi dengan daging domba dalam saus yogurt kering. Pakaian pengantin wanita adalah Thobe Tatreez terbaik yang dimiliki keluarga.',
            ],
            [
                'title'        => 'Kerajinan Gerabah Hebron',
                'arabic_title' => 'الفخار الخليلي',
                'category'     => 'Kerajinan',
                'region'       => 'Hebron (Al-Khalil)',
                'is_featured'  => false,
                'sort_order'   => 12,
                'image_url'    => 'https://images.unsplash.com/photo-1565193566173-7a0ee3dbe261?w=800',
                'description'  => 'Hebron terkenal dengan kerajinan kaca tiup berwarna-warni dan gerabah tradisional yang telah diproduksi selama lebih dari 2.000 tahun.',
                'content'      => 'Pengrajin kaca Hebron menggunakan teknik tiup kaca kuno yang tak banyak berubah sejak era Romawi. Bola-bola kaca berwarna merah, biru, dan hijau yang menghiasi pohon natal di seluruh dunia banyak yang berasal dari Hebron. Workshop kerajinan kaca keluarga seperti Natsheh Glass telah beroperasi selama 6 generasi. Gerabah Hebron dengan glasir biru-turquoise khas juga sangat diminati di pasar dunia.',
            ],
        ];

        foreach ($cultures as $culture) {
            Culture::create($culture);
        }
    }
}
