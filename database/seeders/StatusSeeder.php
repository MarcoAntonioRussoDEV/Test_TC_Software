<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('statuses')->count() == 0) {
            DB::table('statuses')->insert([
                ['name' => 'completed', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'pending', 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }
}
