<?php

namespace App\Http\External;

use Illuminate\Support\Facades\Http;

$url;
$token;

class ConsumeApi
{
    public function __construct()
    {

        $this->url = env('MERCADO_LIVRE_API_URL');
    }

    private static function getUrl()
    {
        return env('MERCADO_LIVRE_API_URL');
    }

    private static function getToken()
    {
        return env('MECADO_LIVRE_ACCESS_TOKEN');
    }

    public static function get($route, $headers = null)
    {
        $response = HTTP::timeout(120)->retry(3, 100)->get(self::getUrl() . $route);

        if ($response->ok()) {
            return $response->json();
        }

        dd($response->body());
    }
}
