<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        $servis = array(
            'Satuan','Sepatu','Antar Jemput',
            'Karpet/Selimut','Boneka','Layanan Mandiri'
        );

        foreach ($servis as $name) {        
            DB::table('services')->insert([
                'name' => $name,            
            ]);
        }
    }
}
