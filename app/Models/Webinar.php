<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use App\Models\WebinarTitle;
use App\Models\ThemeOfWebinar;

class Webinar extends Model
{
    use HasFactory;

    protected $table = "webinars";

    protected $fillable = [
        'title_id',
        'theme_id',
        'estimated_date',
    ];

    public function getUpcomingWebinars()
    {
        $currentDate = date("Y-m-d");

        return $this::where('estimated_date', '>', $currentDate)
            ->join('webinar_titles', 'webinar_titles.id', '=', 'webinars.title_id')
            ->join('theme_of_webinars', 'theme_of_webinars.id', '=', 'webinars.theme_id')
            ->orderBy('estimated_date', 'ASC')
            ->get(['title', 'theme', 'estimated_date']);
    }
}
