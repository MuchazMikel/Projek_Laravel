<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BiodataSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('biodatas')->insert([
            [
                'nama' => 'John Doe',
                'email' => 'johndoe@example.com',
                'alamat' => 'Jl. Merdeka No. 1, Jakarta',
                'foto' => 'nophoto.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
