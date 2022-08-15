<?php

namespace App\Http\External;

use App\Exceptions\MercadoLivreApiIsNotAvailable;
use Illuminate\Support\Facades\Http;

$url;
$token;

class ConsumeApi
{
    private static function getUrl()
    {
        return env('MERCADO_LIVRE_API_URL');
    }

    public static function get($route)
    {
        $response = HTTP::timeout(120)->retry(3, 100)->get(self::getUrl() . $route);

        if ($response->ok()) {
            return $response->json();
        }

        throw new MercadoLivreApiIsNotAvailable("A Api do mercado livre não esta disponível");
    }
}
