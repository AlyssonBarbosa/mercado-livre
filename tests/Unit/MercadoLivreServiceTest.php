<?php

namespace Tests\Unit;

use App\Exceptions\MercadoLivreApiIsNotAvailable;
use App\Services\MercadoLivreService;
use Tests\TestCase;

class MercadoLivreServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_expect_error_api_is_not_avaible()
    {
        $this->expectException(MercadoLivreApiIsNotAvailable::class);

        MercadoLivreService::get('/url-dont-exists');
    }


    public function test_expect_array_body_request()
    {
        $response = MercadoLivreService::get('sites/MLB/categories');
        $this->assertIsArray($response);
    }
}
