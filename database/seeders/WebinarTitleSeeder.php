<?php

namespace Database\Seeders;

use App\Models\WebinarTitle;
use Illuminate\Database\Seeder;

class WebinarTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebinarTitle::truncate();

        $titles = [
            [
                'title' => 'Budget Management',
            ],
            [
                'title' => 'WEB Development',
            ],
            [
                'title' => 'WEB development marketing',
            ],
            [
                'title' => 'Math algorithms',
            ],
            [
                'title' => 'Electric cars generation',
            ],
            [
                'title' => 'How much money you need',
            ],
            [
                'title' => 'Team building meetings',
            ],
            [
                'title' => 'SMM marketing',
            ],
            [
                'title' => 'How to support Your custommers',
            ],
            [
                'title' => 'Work in team',
            ],
            [
                'title' => 'Thi right way to integrate new members to Your team',
            ],
            [
                'title' => 'How to estimate correctly',
            ],
            [
                'title' => 'Public administration must important things',
            ],

        ];
        WebinarTitle::insert($titles);
    }
}
