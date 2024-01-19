<?php

namespace App\Services\Exchangerate;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class Exchangerate
{
    public function __construct(protected string $token) {}


    public function convert($currency,$amount=1,$base_currency=null) :float
    {
        $site_currency=Config::get('settings.site_default_currency',$base_currency);

        $response=Http::get("https://v6.exchangerate-api.com/v6/{$this->token}/pair/{$site_currency}/{$currency}");

        return $response->json('conversion_rate') * $amount;
    }
}