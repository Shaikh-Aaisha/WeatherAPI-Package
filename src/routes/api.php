<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Weather\Weatherbit\Controllers\api\WeatherController;

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
Route::post('/get5DayForcast',[WeatherController::class,'get5DayForcast']);
Route::post('/currentWeatherLocation',[WeatherController::class,'currentWeatherLocation']);
Route::post('/HrMintForecastNowcast',[WeatherController::class,'HrMintForecastNowcast']);
Route::post('/Day16Forecast',[WeatherController::class,'Day16Forecast']);
Route::post('/hr120Forecast',[WeatherController::class,'hr120Forecast']);
Route::post('/severeWeatherAlert',[WeatherController::class,'severeWeatherAlert']);