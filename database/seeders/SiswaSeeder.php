<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            ['nis' => '20387', 'nama' => 'Abu Bakar Tsabit Ghufron', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20389', 'nama' => 'Ade Rafif Daneswara', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20390', 'nama' => 'Ade Zaidan Althaf', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20391', 'nama' => 'Adhwa Khalila Ramadhani', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20392', 'nama' => 'Adnan Faris', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20393', 'nama' => 'Ahmad Hanafi', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20394', 'nama' => 'Akbar Adha', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20395', 'nama' => 'Andhika August', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20396', 'nama' => 'Angelina Thithis Sekarlangit', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20397', 'nama' => 'Athiyya Hanifa', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20398', 'nama' => 'Arifin Nur Ikhsan', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20399', 'nama' => 'Aulia Maharani ', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20400', 'nama' => 'Arya Eka', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20401', 'nama' => 'Bijak Putra', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20402', 'nama' => 'Christian Jarot', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20403', 'nama' => 'Daffa Arya', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20404', 'nama' => 'Dimas Bagus', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20405', 'nama' => 'Ekalaya kemal', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20406', 'nama' => 'Fadly Athalla', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20407', 'nama' => 'Faradila Syifa', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20408', 'nama' => 'Farcha Amalia', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20409', 'nama' => 'Fauzan Adzima', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20410', 'nama' => 'Gilang', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20411', 'nama' => 'Gisello', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20412', 'nama' => 'Ilham Putra', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20414', 'nama' => 'Isnaini', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20415', 'nama' => 'Izuddin', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20416', 'nama' => 'jeconia Vale', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20417', 'nama' => 'Jardella', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20418', 'nama' => 'Kaysa Aqila Amta', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20419', 'nama' => 'Kevin Andrea', 'gender' => 'P', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20420', 'nama' => 'Marcelinus Christo', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
            ['nis' => '20421', 'nama' => 'Meidinna Tiara', 'gender' => 'L', 'alamat' => 'Alamat siswa', 'kontak' => 'Kontak Siswa', 'status_lapor_pkl' => false],
        ];

        foreach ($data as $item) {
            
            // Membuat email berdasarkan format nis@sija.com
            $email = "{$item['nis']}@stembayo.com";

            // Menambahkan email yang sesuai dengan format
            $item['email'] = $email;
            
            
            // Memasukkan atau mencari siswa berdasarkan email
            Siswa::firstOrCreate(
                ['email' => $email],
                $item // Menambahkan data lainnya (nama, nis, gender, dll.)
            );
        }
    }
}