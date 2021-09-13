<?php

namespace Database\Seeders;

use App\Models\Webinar;
use Illuminate\Database\Seeder;

class WebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Webinar::truncate();

        $titles = [
            [
                'title_id' => 6,
                'theme_id' => 4,
                'estimated_date' => '2021-09-12 09:00:00',
            ],
            [
                'title_id' => 4,
                'theme_id' => 4,
                'estimated_date' => '2021-11-12 09:00:00',
            ],
            [
                'title_id' => 5,
                'theme_id' => 4,
                'estimated_date' => '2021-11-22 09:00:00',
            ],
            [
                'title_id' => 1,
                'theme_id' => 1,
                'estimated_date' => '2021-11-01 09:00:00',
            ],
            [
                'title_id' => 1,
                'theme_id' => 1,
                'estimated_date' => '2021-11-01 13:00:00',
            ],
            [
                'title_id' => 13,
                'theme_id' => 4,
                'estimated_date' => '2021-11-03 09:00:00',
            ],
            [
                'title_id' => 2,
                'theme_id' => 2,
                'estimated_date' => '2021-10-01 09:00:00',
            ],
            [
                'title_id' => 7,
                'theme_id' => 7,
                'estimated_date' => '2021-11-28 13:00:00',
            ],
            [
                'title_id' => 11,
                'theme_id' => 7,
                'estimated_date' => '2021-12-30 09:00:00',
            ],
            [
                'title_id' => 13,
                'theme_id' => 10,
                'estimated_date' => '2021-11-01 09:00:00',
            ],
            [
                'title_id' => 3,
                'theme_id' => 1,
                'estimated_date' => '2021-01-01 09:00:00',
            ],
            [
                'title_id' => 3,
                'theme_id' => 1,
                'estimated_date' => '2021-03-18 09:00:00',
            ],
            [
                'title_id' => 7,
                'theme_id' => 9,
                'estimated_date' => '2021-08-22 09:00:00',
            ],
        ];
        Webinar::insert($titles);
    }
}
