<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Database\Seeders\ThemeOfWebinarSeeder;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\ThemeOfWebinar;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class WebinarController extends Controller
{
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

        if (!empty(json_decode($result, true))) {
            $res['massage'] = $result;
        } else {
            $res['massage'] = 'There are not upcoming webinars';
        }

        return response()->json($res, 200);
    }

    /**
     * Display the filtered Webinars by Date and Theme.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFilteredWebinarsByThemeAndMonth(Request $request)
    {

        $requestData = $request->all(['theme', 'month']);

        $res = [];
        $res['success'] = false;
        $res['massage'] = '';
        $responseStatus = 500;

        if (!isset($requestData['theme']) || !isset($requestData['month'])) {

            $res['massage'] = 'Theme and Month are REQUIRED  parametters!';
        } else {

            $validator = Validator::make(
                ['theme' => $requestData['theme'], 'month' => $requestData['month']],
                [
                    'theme' => 'array',
                    'month' => 'required|array|min:1'
                ]
            );

            if ($validator->fails()) {
                $res['massage'] = 'Invalid Parametters. Theme and Month must be arrays and both are required';
            } else {
                foreach ($requestData['month'] as $index => $month) {
                    if ($month > 12 || $month < 0) {
                        $res['massage'] = 'Invalid Parametter. Mont can not be biggest than 12 and must be unsigned';
                        return response()->json($res, $responseStatus);
                    }
                }

                $themeIds = [];

                if (count($requestData['theme']) == 0) {
                    $themeIds =  ThemeOfWebinar::where('id', '>', 0)->pluck('id')->toArray();
                } else {
                    $themeIds = $requestData['theme'];
                }

                $webinars = Webinar::whereIn(DB::raw('MONTH(estimated_date)'), $requestData['month'])
                    ->WhereIn('theme_id', $themeIds)
                    ->join('webinar_titles', 'webinar_titles.id', '=', 'webinars.title_id')
                    ->join('theme_of_webinars', 'theme_of_webinars.id', '=', 'webinars.theme_id')
                    ->orderBy('estimated_date', 'ASC')
                    ->get(['title', 'theme', 'estimated_date']);
            }
            
            $res['success'] = true;
            $responseStatus = 200;

            if($webinars->isEmpty()) {
                $res['message'] = 'Can not Find any webinar with your filters';
            }
            else {
                $res['message'] = $webinars;
            }
        }
        return response()->json($res, $responseStatus);
    }


    /**
     * Display the filtered Webinars filtered only by Date.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFilteredWebinarsByDateOnly(Request $request)
    {

        $requestData = $request->all(['month']);

        $res = [];
        $res['success'] = false;
        $res['massage'] = '';
        $responseStatus = 500;
      
        if (count($requestData['month']) == 0) {
            $res['massage'] = 'The Month is REQUIRED  parametter and can not be Empty!';
        } 
        else {
            $validator = Validator::make(
                ['month' => $requestData['month']],
                [
                    'month' => 'required|array|min:1'
                ]
            );

            if ($validator->fails()) {
                $res['massage'] = 'Invalid Parametters. Month must be array and required';
            } else {
                foreach ($requestData['month'] as $index => $month) {
                    if ($month > 12 || $month < 0) {
                        $res['massage'] = 'Invalid Parametter. Mont can not be biggest than 12 and must be unsigned';
                        return response()->json($res, $responseStatus);
                    }
                }

                $webinars = Webinar::whereIn(DB::raw('MONTH(estimated_date)'), $requestData['month'])
                    ->join('webinar_titles', 'webinar_titles.id', '=', 'webinars.title_id')
                    ->join('theme_of_webinars', 'theme_of_webinars.id', '=', 'webinars.theme_id')
                    ->orderBy('estimated_date', 'ASC')
                    ->get(['title', 'theme', 'estimated_date']);
            }
            // dd($webinars->all());
            
            $res['success'] = true;
            $responseStatus = 200;

            if($webinars->isEmpty()) {
                $res['message'] = 'Can not Find any webinar with your choosed Date';
            }
            else {
                $res['message'] = $webinars;
            }
            
        }
        return response()->json($res, $responseStatus);
    }
}
