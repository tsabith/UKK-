<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gurus')->insert([
            [
                'nama' => 'Sugiarto',
                'nip' => '19720317 200501 1 012',
                'gender' => 'L',
                'alamat' => 'Alamat guru',
                'kontak' => '12431342465',
                'email' => 'ugik@sija.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Yunianto Hermawan',
                'nip' => '19730620 200604 1 005',
                'gender' => 'L',
                'alamat' => 'Alamat guru',
                'kontak' => '457457235',
                'email' => 'yuni@sija.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Margaretha Endah Titisari',
                'nip' => '19740302 200604 2 008',
                'gender' => 'P',
                'alamat' => 'Alamat guru',
                'kontak' => '098678436',
                'email' => 'endah@sija.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Eka Nur Ahmad Romadhoni',
                'nip' => '19930301 201903 1 011',
                'gender' => 'L',
                'alamat' => 'Alamat guru',
                'kontak' => '098567235235',
                'email' => 'eka@sija.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rr. Retna Trimantaraningsih',
                'nip' => '19700627 202121 2 002',
                'gender' => 'P',
                'alamat' => 'Alamat guru',
                'kontak' => '9678745345',
                'email' => 'rere@sija.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ratna Yunitasari',
                'nip' => '19710601 202121 2 002',
                'gender' => 'P',
                'alamat' => 'Alamat guru',
                'kontak' => '08983436346',
                'email' => 'ratna@sija.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}