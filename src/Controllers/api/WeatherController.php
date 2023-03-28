<?php

namespace Weather\Weatherbit\Controllers\api;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Weather\Weatherbit\Services\WeatherService;

class WeatherController
{
    public function get5DayForcast(Request $req)
    {
        $data = $req->only('latitude','longitude','units','language');
        $validator = Validator::make($data, [
            'latitude'   => 'required',//Lantitude for yor location
            'longitude' => 'required'//Longitude for your location
            
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status'    => 'failed',
                    'errors'    =>  $validator->errors(),
                    'message'   =>  trans('validation.custom.input.invalid'),
                ],
                400
            );
        } 
        else
        {
            try
            {
                //Object of Service class
                $WeatherService = new WeatherService;
                $latitude = $req->latitude;
                $longitude = $req->longitude;
                $units = $req->units ? $req->units : '';
                $language = $req->language ? $req->language : '';
                $weather_info = $WeatherService->get5DayForcast($latitude,$longitude,$units,$language);
                if($weather_info == null)
                {
                    return response()->json([
                        'status'  => 'failed',
                        'message' => trans('validation.custom.input.nodata'),
                    ],400);
                }
                else
                {
                    return response()->json([
                        'status'  => 'success',
                        'message' => trans('validation.custom.input.forecast'),
                        'flight-info' => json_decode($weather_info)
                    ],200);
                }
            
            }
            catch (\Throwable $e)
            {
                return response()->json([
                    'status'  => 'failed',
                    'message' => trans('validation.custom.invalid.request'),
                    'error'   => $e->getMessage()
                ],500);
            }
        }

    }
    public function currentWeatherLocation(Request $req)
    {
        $data = $req->only('latitude','longitude','units','language');
        $validator = Validator::make($data, [
            'latitude'   => 'required',
            'longitude' => 'required'
            //units may be imperial/ metric/ 
            //language : Language for weather description

 
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status'    => 'failed',
                    'errors'    =>  $validator->errors(),
                    'message'   =>  trans('validation.custom.input.invalid'),
                ],
                400
            );
        } 
        else
        {
            try
            {
                //Service class
                $WeatherService = new WeatherService;
                $latitude = $req->latitude;
                $longitude = $req->longitude;
                $units = $req->units;
                $language = $req->language;
                $weather_info = $WeatherService->currentWeatherLocation($latitude,$longitude,$units,$language);
                if($weather_info == null)
                {
                    return response()->json([
                        'status'  => 'failed',
                        'message' => trans('validation.custom.input.nodata'),
                    ],400);
                }
                else
                {
                    return response()->json([
                        'status'  => 'success',
                        'message' => trans('validation.custom.input.cweather'),
                        'flight-info' => json_decode($weather_info)
                    ],200);
                }
            
            }
            catch (\Throwable $e)
            {
                return response()->json([
                    'status'  => 'failed',
                    'message' => trans('validation.custom.invalid.request'),
                    'error'   => $e->getMessage()
                ],500);
            }
        }

    }
    public function HrMintForecastNowcast(Request $req)
    {
        $data = $req->only('latitude','longitude','units');
        $validator = Validator::make($data, [
            'latitude'   => 'required',
            'longitude' => 'required'
            
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status'    => 'failed',
                    'errors'    =>  $validator->errors(),
                    'message'   =>  trans('validation.custom.input.invalid'),
                ],
                400
            );
        } 
        else
        {
            try
            {
                //Service class
                $WeatherService = new WeatherService;
                $latitude = $req->latitude;
                $longitude = $req->longitude;
                $units = $req->units;
                $weather_info = $WeatherService->HrMintForecastNowcast($latitude,$longitude,$units);
                if($weather_info == null)
                {
                    return response()->json([
                        'status'  => 'failed',
                        'message' => trans('validation.custom.input.nodata'),
                    ],400);
                }
                else
                {
                    return response()->json([
                        'status'  => 'success',
                        'message' => trans('validation.custom.input.hrmintforecast'),
                        'flight-info' => json_decode($weather_info)
                    ],200);
                }
            
            }
            catch (\Throwable $e)
            {
                return response()->json([
                    'status'  => 'failed',
                    'message' => trans('validation.custom.invalid.request'),
                    'error'   => $e->getMessage()
                ],500);
            }
        }

    }
    public function Day16Forecast(Request $req)
    {
        $data = $req->only('latitude','longitude','units','language');
        $validator = Validator::make($data, [
            'latitude'   => 'required',
            'longitude' => 'required'
            
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status'    => 'failed',
                    'errors'    =>  $validator->errors(),
                    'message'   =>  trans('validation.custom.input.invalid'),
                ],
                400
            );
        } 
        else
        {
            try
            {
                //Service class
                $WeatherService = new WeatherService;
                $latitude = $req->latitude;
                $longitude = $req->longitude;
                $units = $req->units;
                $language = $req->langauge;
                $weather_info = $WeatherService->Day16Forecast($latitude,$longitude,$units,$language);
                if($weather_info == null)
                {
                    return response()->json([
                        'status'  => 'failed',
                        'message' => trans('validation.custom.input.nodata'),
                    ],400);
                }
                else
                {
                    return response()->json([
                        'status'  => 'success',
                        'message' => trans('validation.custom.input.day16forecast'),
                        'flight-info' => json_decode($weather_info)
                    ],200);
                }

            }
            catch (\Throwable $e)
            {
                return response()->json([
                    'status'  => 'failed',
                    'message' => trans('validation.custom.invalid.request'),
                    'error'   => $e->getMessage()
                ],500);
            }
        }
    }
    public function hr120Forecast(Request $req)
    {
        $data = $req->only('latitude','longitude','hours','units','language');
        $validator = Validator::make($data, [
            'latitude'   => 'required',
            'longitude' => 'required'
            //hours: Limit number of forecast hours
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status'    => 'failed',
                    'errors'    =>  $validator->errors(),
                    'message'   =>  trans('validation.custom.input.invalid'),
                ],
                400
            );
        } 
        else
        {
            try
            {
                //Service class
                $WeatherService = new WeatherService;
                $latitude = $req->latitude;
                $longitude = $req->longitude;
                $hours = $req->hours;
                $units = $req->units;
                $language = $req->language;
                $weather_info = $WeatherService->hr120Forecast($latitude,$longitude,$hours,$units,$language);
                if($weather_info == null)
                {
                    return response()->json([
                        'status'  => 'failed',
                        'message' => trans('validation.custom.input.nodata'),
                    ],400);
                }
                else
                {
                    return response()->json([
                        'status'  => 'success',
                        'message' => trans('validation.custom.input.hrforecast'),
                        'flight-info' => json_decode($weather_info)
                    ],200);
                }

            }
            catch (\Throwable $e)
            {
                return response()->json([
                    'status'  => 'failed',
                    'message' => trans('validation.custom.invalid.request'),
                    'error'   => $e->getMessage()
                ],500);
            }
        }
    }
    public function severeWeatherAlert(Request $req)
    {
        $data = $req->only('latitude','longitude');
        $validator = Validator::make($data, [
            'latitude'   => 'required',
            'longitude' => 'required'
            
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status'    => 'failed',
                    'errors'    =>  $validator->errors(),
                    'message'   =>  trans('validation.custom.input.invalid'),
                ],
                400
            );
        } 
        else
        {
            try
            {
                //Service class
                $WeatherService = new WeatherService;
                $latitude = $req->latitude;
                $longitude = $req->longitude;
                $weather_info = $WeatherService->severeWeatherAlert($latitude,$longitude);
                if($weather_info == null)
                {
                    return response()->json([
                        'status'  => 'failed',
                        'message' => trans('validation.custom.input.nodata'),
                    ],400);
                }
                else
                {
                    return response()->json([
                        'status'  => 'success',
                        'message' => trans('validation.custom.input.weatheralert'),
                        'flight-info' => json_decode($weather_info)
                    ],200);
                }

            }
            catch (\Throwable $e)
            {
                return response()->json([
                    'status'  => 'failed',
                    'message' => trans('validation.custom.invalid.request'),
                    'error'   => $e->getMessage()
                ],500);
            }
        }
    }
}
