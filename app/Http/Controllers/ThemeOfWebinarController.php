<?php

namespace App\Http\Controllers;

use App\Models\ThemeOfWebinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\GetWebinarTheme;

class ThemeOfWebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $webinars = ThemeOfWebinar::all();

       return response()->json($webinars, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ThemeOfWebinar  $themeOfWebinar
     * @return \Illuminate\Http\Response
     */
    public function show(ThemeOfWebinar $themeOfWebinar)
    {
        //
    }

    /**
     * Getting webinar theme by id
     *
     * @param  \App\Models\ThemeOfWebinar  $id
     * @return \Illuminate\Http\Response
     */
    public function getWebinarThemeById($id)
    {
        $res = [];
        $responseStatus = 400;
        $validator = Validator::make(['data' => $id],
            ['data' => 'integer|min:1']
        );

        if ($validator->fails()) {
           $res['massage'] = 'The ID MUST be unsigned integer';
        }
        else {
            $responseStatus = 200;
            $themeOfWebinar = ThemeOfWebinar::find($id);
           if (!empty($themeOfWebinar)) {
               $res['massage'] = $themeOfWebinar;
           }
           else {
               $res['massage'] = "Can`t find the theme of webinar by id $id";
           }
        }
        return response()->json($res, $responseStatus);
    }
}
