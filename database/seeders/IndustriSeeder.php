<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Gamatechno Indonesia',
                'bidang_usaha' => 'Software House',
                'alamat' => 'Jl. Purwomartani, Karangmojo, Purwomartani, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55571',
                'kontak' => '+62-274-566161',
                'email' => 'info@gamatechno.com',
                'website' => 'https://www.gamatechno.com',
            ],
            [
                'nama' => 'Aksa Digital Group',
                'bidang_usaha' => 'Jasa TI dan Konsultan TI',
                'alamat' => 'Sleman, Yogyakarta 55581, Indonesia',
                'kontak' => '+62-274-1234567',
                'email' => 'contact@aksa.id',
                'website' => 'https://aksa.id',
            ],
            [
                'nama' => 'CV Karya Hidup Sentosa',
                'bidang_usaha' => 'Manufaktur Alat Pertanian',
                'alamat' => 'Jl. Magelang 144, Yogyakarta 55241, Indonesia',
                'kontak' => '+62-274-512095',
                'email' => 'operator1@quick.co.id',
                'website' => 'https://quick.co.id',
            ],
            [
                'nama' => 'Botika Online',
                'bidang_usaha' => 'Chatbot dan Konsultan TI',
                'alamat' => 'Jl. Perumnas Blok E III No.50, Seturan, Yogyakarta',
                'kontak' => '+62-818-0220-7000',
                'email' => 'admin@botika.online',
                'website' => 'http://botika.online',
            ],
            [
                'nama' => 'Cargloss Group',
                'bidang_usaha' => 'Manufaktur Produk Otomotif',
                'alamat' => 'Bogor, Jawa Barat, Indonesia',
                'kontak' => '+62-251-1234567',
                'email' => 'info@cargloss.co.id',
                'website' => 'https://cargloss.co.id',
            ],
            [
                'nama' => 'Divistant',
                'bidang_usaha' => 'Jasa TI dan Konsultan TI',
                'alamat' => 'Jl. Ampel No.23, Demangan Baru, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281',
                'kontak' => '+62-21-39702834',
                'email' => 'contact@divistant.com',
                'website' => 'https://divistant.com',
            ],
            [
                'nama' => 'Jembatan Citra Nusantara (Citraweb)',
                'bidang_usaha' => 'Internet Service Provider',
                'alamat' => 'Jl. Magelang No.KM 7, Jongke Tengah, Sendangadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55285',
                'kontak' => '+62-274-1234567',
                'email' => 'info@citra.net.id',
                'website' => 'https://www.citraweb.com',
            ],
            [
                'nama' => 'SIMS LifeMedia',
                'bidang_usaha' => 'Multimedia dan IoT',
                'alamat' => 'Jalan Parangtritis, Brontokusuman, Yogyakarta, Indonesia',
                'kontak' => '+62-274-1234567',
                'email' => 'info@lifemedia.id',
                'website' => 'https://lifemedia.id',
            ],
            [
                'nama' => 'Otskyr Sembagi Mandara Nawasena',
                'bidang_usaha' => 'Cybersecurity',
                'alamat' => 'Jalan Palagan Tentara Pelajar, RT 04 RW 18, Tegal Rejo, Sariharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta',
                'kontak' => '----',
                'email' => '----',
                'website' => 'https://sysbraykr.com/',
            ],
            [
                'nama' => 'Wahana Lintas Nusa Persada',
                'bidang_usaha' => 'Telekomunikasi dan Jaringan',
                'alamat' => 'Jakarta, Indonesia',
                'kontak' => '+62-21-1234567',
                'email' => 'info@wlnp.co.id',
                'website' => 'https://wlnp.co.id',
            ],
            [
                'nama' => 'PT KAI DAOP 6',
                'bidang_usaha' => 'Perusahaan Kereta Api',
                'alamat' => 'Jl. Lempuyangan No.1, Tegal Panggung, Kec. Danurejan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55212',
                'kontak' => '----',
                'email' => 'humasda6@kai.id',
                'website' => 'https://ppid.kai.id/_daop6/',
            ],
            [
                'nama' => 'Politeknik LPP',
                'bidang_usaha' => 'Politeknik Perkebunan',
                'alamat' => 'Jl. Urip Sumoharjo No.1, Klitren, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55222',
                'kontak' => '(0274) 555776',
                'email' => 'surat@polteklpp.ac.id',
                'website' => 'https://polteklpp.ac.id/',
            ],
            [
                'nama' => 'Red Ant Colony',
                'bidang_usaha' => 'Pengembangan Perangkat Lunak',
                'alamat' => 'Jl. Sugeng Jeroni, Patangpuluhan, Wirobrajan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55251',
                'kontak' => '+62-21-1234567',
                'email' => 'info@redantcolony.com',
                'website' => 'https://redantcolony.com',
            ],
            [
                'nama' => 'Neutron Group',
                'bidang_usaha' => 'Pendidikan dan Pelatihan',
                'alamat' => 'Yogyakarta, Indonesia',
                'kontak' => '+62-274-1234567',
                'email' => 'info@neutron.co.id',
                'website' => 'https://neutron.co.id',
            ],
            [
                'nama' => 'Cyberkarta',
                'bidang_usaha' => 'CyberSecurity',
                'alamat' => 'Jl. Pogung Kidul No.17, Pogung Kidul, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284',
                'kontak' => '+62-851-6183-5865',
                'email' => 'business@cyberkarta.com',
                'website' => 'https://cyberkarta.com',
            ],
        ];

        DB::table('industris')->insert($data);
    }
}
