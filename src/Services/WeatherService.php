<?php
namespace Weather\Weatherbit\Services;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class WeatherService
{

    public function get5DayForcast($latitude,$longitude,$units,$language)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://weatherbit-v1-mashape.p.rapidapi.com/forecast/3hourly?lat='.$latitude.'&lon='.$longitude.'&units='.$units.'&lang='.$language, [
            'headers' => [
                'X-RapidAPI-Key' => env('RAPID_API_KEY'),
            ],
        ]);
        $data = $response->getBody()->getContents();
        return $data;
    }
    public function currentWeatherLocation($latitude,$longitude,$units,$language)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://weatherbit-v1-mashape.p.rapidapi.com/current?lat='.$latitude.'&lon='.$longitude.'&units='.$units.'&lang='.$language, [
            'headers' => [
                'X-RapidAPI-Key' => env('RAPID_API_KEY'),
            ],
        ]);
        $data = $response->getBody()->getContents();
        return $data;
    }
    public function HrMintForecastNowcast($latitude,$longitude,$units)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://weatherbit-v1-mashape.p.rapidapi.com/forecast/minutely?lat='.$latitude.'&lon='.$longitude.'&units='.$units, [
            'headers' => [
                'X-RapidAPI-Key' => env('RAPID_API_KEY'),
            ],
        ]);
        $data = $response->getBody()->getContents();
        return $data;
    }
    public function Day16Forecast($latitude,$longitude,$units,$language)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://weatherbit-v1-mashape.p.rapidapi.com/forecast/daily?lat='.$latitude.'&lon='.$longitude.'&units='.$units.'&lang='.$language, [
            'headers' => [
                'X-RapidAPI-Key' => env('RAPID_API_KEY'),
            ],
        ]);
        $data = $response->getBody()->getContents();
        return $data;
    }
    public function hr120Forecast($latitude,$longitude,$hours,$units,$language)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://weatherbit-v1-mashape.p.rapidapi.com/forecast/hourly?lat='.$latitude.'&lon='.$longitude.'&lang='.$language.'&hours='.$hours.'&units='.$units, [
            'headers' => [
                'X-RapidAPI-Key' => env('RAPID_API_KEY'),
            ],
        ]);
        $data = $response->getBody()->getContents();
        return $data;
    }
    public function severeWeatherAlert($latitude,$longitude)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://weatherbit-v1-mashape.p.rapidapi.com/alerts?lat='.$latitude.'&lon='.$longitude, [
            'headers' => [
                'X-RapidAPI-Key' => env('RAPID_API_KEY'),
            ],
        ]);
        $data = $response->getBody()->getContents();
        return $data;
    }
}