<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{

    public function run()
    {
        $data = [
            [
                'symbolics' => '🟢⚪️⚪️⚪️⚪️⚪️⚪️⚪️⚪️⚪️'
            ],
            [
                'symbolics' => '🟢🟢⚪️⚪️⚪️⚪️⚪️⚪️⚪️⚪️'
            ],
            [
                'symbolics' => '🟢🟢🟢⚪️⚪️⚪️⚪️⚪️⚪️⚪️'
            ],
            [
                'symbolics' => '🟢🟢🟢🟢⚪️⚪️⚪️⚪️⚪️⚪️️'
            ],
            [
                'symbolics' => '🟢🟢🟢🟢🟢⚪️⚪️⚪️⚪️⚪️️'
            ],
            [
                'symbolics' => '🟢🟢🟢🟢🟢🟢⚪️⚪️⚪️⚪️️'
            ],
            [
                'symbolics' => '🟢🟢🟢🟢🟢🟢🟢⚪️⚪️⚪️️'
            ],
            [
                'symbolics' => '🟢🟢🟢🟢🟢🟢🟢🟢⚪️⚪️'
            ],
            [
                'symbolics' => '🟢🟢🟢🟢🟢🟢🟢🟢🟢🟢'
            ],
        ];
        DB::table('levels')->insert($data);
    }
}
