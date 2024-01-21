<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use NumberFormatter;

class Currency
{
    public function __invoke(...$params)
    {
        return static::format(...$params);
    }

    public static function convert($amount, $currency = null)
    {     
        $baseCurrency = config('settings.site_default_currency', 'USD');
        
        if ($currency === null) {
            $currency = Session::get('currency_code', $baseCurrency);
        }

        if ($currency != $baseCurrency) {
            $rate = Cache::get("currency_rate_{$currency}", 1);
            $amount = $amount * $rate;
        }

        return $amount;
    }

    public static function format($amount, $currency = null)
    {
        $baseCurrency = config('settings.site_default_currency', 'USD');

        if ($currency === null) {
            $currency = Session::get('currency_code', $baseCurrency);
        }

        $formatter = new NumberFormatter(config('app.locale'), NumberFormatter::CURRENCY);

        $converted_amount=self::convert($amount, $currency);

        return $formatter->formatCurrency($converted_amount, $currency);
    }
}