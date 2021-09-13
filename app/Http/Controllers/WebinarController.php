<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class WebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Webinar $webinar
     * @return \Illuminate\Http\Response
     */
    public function show(Webinar $webinar)
    {
        //
    }

    /**
     * Display the Upcoming Webinars.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUpcomingWebinars()
    {
        $res = [];
        $webinars = new Webinar();
        $result = $webinars->getUpcomingWebinars();

        if (!empty(json_decode($result,true))) {
            $res['massage'] = $result;
        } else {
            $res['massage'] = 'There are not upcoming webinars';
        }

        return response()->json($res, 200);
    }
}
