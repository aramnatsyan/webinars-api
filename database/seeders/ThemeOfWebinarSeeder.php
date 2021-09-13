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
                'name' => 'Finances',
            ],
            [
                'name' => 'IT',
            ],
            [
                'name' => 'Marketing',
            ],
            [
                'name' => 'Education',
            ],
            [
                'name' => 'Transport',
            ],
            [
                'name' => 'Finances',
            ],
            [
                'name' => 'HR',
            ],
            [
                'name' => 'PR',
            ],
            [
                'name' => 'Customer Support',
            ],
            [
                'name' => 'Team Working',
            ],
            [
                'name' => 'People Relations',
            ],
            [
                'name' => 'Work Estimation',
            ],
            [
                'name' => 'Public Administration',
            ],

        ];

        ThemeOfWebinar::insert($themes);
    }
}
