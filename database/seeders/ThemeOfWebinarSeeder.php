<?php

namespace Database\Seeders;

use App\Models\ThemeOfWebinar;
use Illuminate\Database\Seeder;

class ThemeOfWebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ThemeOfWebinar::truncate();

        $themes = [
            [
                'theme' => 'Finances',
            ],
            [
                'theme' => 'IT',
            ],
            [
                'theme' => 'Marketing',
            ],
            [
                'theme' => 'Education',
            ],
            [
                'theme' => 'Transport',
            ],
            [
                'theme' => 'Finances',
            ],
            [
                'theme' => 'HR',
            ],
            [
                'theme' => 'PR',
            ],
            [
                'theme' => 'Customer Support',
            ],
            [
                'theme' => 'Team Working',
            ],
            [
                'theme' => 'People Relations',
            ],
            [
                'theme' => 'Work Estimation',
            ],
            [
                'theme' => 'Public Administration',
            ],

        ];

        ThemeOfWebinar::insert($themes);
    }
}
