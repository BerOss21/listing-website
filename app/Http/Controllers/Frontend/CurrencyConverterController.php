<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CurrencyConverterRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Services\Exchangerate\Exchangerate;

class CurrencyConverterController extends Controller
{
    public function __invoke(CurrencyConverterRequest $request,Exchangerate $exchangerate)
    {
        $currencyCode = $request->validated('currency_code');

        Session::put('currency_code', $currencyCode);
        
        Cache::remember("currency_rate_{$currencyCode}",now()->addMinutes(60),function() use($currencyCode,$exchangerate){
            return $exchangerate->convert($currencyCode);
        });
        
        return redirect()->back();
    }
}
