<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TingkatKesulitan;
use App\Models\Topik;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Topik::factory(3)->create();

        TingkatKesulitan::create([
            'nm_tingkat_kesulitan' => 'Mudah',
            'bobot' => '1'
        ]);

        TingkatKesulitan::create([
            'nm_tingkat_kesulitan' => 'Sedang',
            'bobot' => '2'
        ]);

        TingkatKesulitan::create([
            'nm_tingkat_kesulitan' => 'Sulit',
            'bobot' => '3'
        ]);
    }
}
