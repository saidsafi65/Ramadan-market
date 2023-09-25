<?php

namespace Database\Seeders;

use App\Models\JawalBalance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JawalBalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        JawalBalance::factory()->create([
            'jawal_blance' => 0,
            'recent_add' => 0,
            'recent_withdrawn' => 0,
            'old_jawal_blance' => 0,
            'is_debt' => false,
            'trader_name' => ' ',
            'remm' => ' ',
        ]);
    }
}
