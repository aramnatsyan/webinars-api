<?php

use App\Http\Controllers\WebinarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeOfWebinarController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*
  endpoint will return all themes of webinars
 */
Route::post('themes-of-webinar', [ThemeOfWebinarController::class, 'index']);


/*
  The endpoint will return theme of webinar searching by id
 */
Route::post('themes-of-webinar/{id}', [ThemeOfWebinarController::class, 'getWebinarThemeById']);


/*
  The endpoint will return all upcoming webinars
 */
Route::post('getUpcomingWebinars', [WebinarController::class, 'getUpcomingWebinars']);


/*
  The endpoint will return full webinar data (filtered)
 */
Route::post('getWebinar', [WebinarController::class, 'getWebinar']);


