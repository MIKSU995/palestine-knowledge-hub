<?php

namespace Database\Seeders;

use App\Models\Petition;
use Illuminate\Database\Seeder;

class PetitionSeeder extends Seeder
{
    public function run(): void
    {
        Petition::create([
            'title'             => 'Hentikan Agresi: Solidaritas Untuk Rakyat Gaza',
            'description'       => 'Bergabunglah bersama kami dalam menyuarakan kepedulian terhadap rakyat Gaza. Setiap tanda tangan adalah suara solidaritas yang nyata.',
            'content'           => "Kepada Para Pemimpin Dunia,\n\nKami, rakyat yang berdiri atas nama kemanusiaan, menyerukan agar dunia internasional segera mengambil tindakan nyata untuk menghentikan kekerasan terhadap rakyat sipil Gaza dan seluruh Palestina.\n\nRakyat Gaza adalah manusia seperti kita. Mereka memiliki hak yang sama untuk hidup, mendapat pendidikan, dan merasakan kedamaian. Anak-anak Gaza berhak untuk bermain, sekolah, dan bermimpi tentang masa depan mereka.\n\nKami menuntut:\n1. Gencatan senjata segera dan permanen\n2. Akses kemanusiaan yang tidak terhalang ke Gaza\n3. Pembebasan semua tahanan sipil\n4. Akuntabilitas internasional atas kejahatan perang\n5. Solusi politik yang adil berdasarkan hukum internasional\n\nSetiap tanda tangan Anda adalah suara yang bergema di koridor-koridor kekuasaan dunia. Bersatu, kita bisa membuat perbedaan.",
            'target_signatures' => '100000',
            'signature_count'   => 87342,
            'is_active'         => true,
            'external_link'     => null,
        ]);

        Petition::create([
            'title'             => 'Lindungi Masjid Al-Aqsa: Warisan Umat Manusia',
            'description'       => 'Al-Aqsa Mosque adalah situs suci yang diakui UNESCO. Mari bersama menyuarakan perlindungannya sebagai warisan bersama umat manusia.',
            'content'           => "Kepada UNESCO dan Komunitas Internasional,\n\nMasjid Al-Aqsa adalah salah satu situs paling suci dan bersejarah di dunia. Sebagai bagian dari Kota Tua Jerusalem yang masuk dalam Daftar Warisan Dunia UNESCO, Al-Aqsa adalah warisan bersama seluruh umat manusia.\n\nKami menuntut perlindungan penuh terhadap integritas fisik dan spiritual Masjid Al-Aqsa dan seluruh Kota Tua Jerusalem sesuai dengan resolusi UNESCO dan hukum internasional.\n\nBergabunglah menyuarakan perlindungan untuk warisan kemanusiaan yang tak ternilai ini.",
            'target_signatures' => '50000',
            'signature_count'   => 41205,
            'is_active'         => true,
            'external_link'     => null,
        ]);
    }
}
