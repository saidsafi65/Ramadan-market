<?php

namespace Database\Seeders;

use App\Models\ElectristyBalance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElectristyBalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ElectristyBalance::factory()->create([
            'electristy_blance' => 0,
            'recent_add' => 0,
            'recent_withdrawn' => 0,
            'old_electristy_blance' => 0,
            'is_debt' => false,
            'trader_name' => ' ',
            'remm' => ' ',
        ]);
    }
}
