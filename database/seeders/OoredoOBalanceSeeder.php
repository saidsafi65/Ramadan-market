<?php

namespace Database\Seeders;

use App\Models\OoredoOBalance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OoredoOBalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        OoredoOBalance::factory()->create([
            'ooredo_blance' => 0,
            'recent_add' => 0,
            'recent_withdrawn' => 0,
            'old_ooredo_blance' => 0,
            'is_debt' => false,
            'trader_name' => ' ',
            'remm' => ' ',
        ]);
    }
}
