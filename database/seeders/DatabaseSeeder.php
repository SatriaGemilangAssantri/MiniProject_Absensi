<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Materi;
use App\Models\Kelas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'id_asisten' => '123456',
            'name' => 'Admin',
            'join_date' => '2024-11-03',
            'role' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'id_asisten' => '112345',
            'name' => 'PJ1',
            'join_date' => '2024-11-03',
            'role' => 'pj',
            'email' => 'pj1@mail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'id_asisten' => '122345',
            'name' => 'Asisten1',
            'join_date' => '2024-11-03',
            'role' => 'asisten',
            'email' => 'asisten@mail.com',
            'password' => bcrypt('password')
        ]);

        Kelas::create([
            'jurusan' => 'Teknik Informatika',
            'fakultas' => 'Ilmu Komputer',
            'tingkat' => '4',
            'nama_kelas' => '4KA01'
        ]);

        Kelas::create([
            'jurusan' => 'Sistem Informasi',
            'fakultas' => 'Ilmu Komputer',
            'tingkat' => '4',
            'nama_kelas' => '4KA02'
        ]);

        Materi::create([
            'materi' => 'PBO'
        ]);

        Materi::create([
            'materi' => 'Web Programming'
        ]);

        Materi::create([
            'materi' => 'Desain'
        ]);
    }
}
