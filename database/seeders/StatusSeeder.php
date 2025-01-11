<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            ['name' => 'completed', "created_at" => now(), "updated_at" => now()],
            ['name' => 'pending', "created_at" => now(), "updated_at" => now()],
        ]);
    }
}
