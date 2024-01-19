<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Symfony\Component\Intl\Currencies;

class CurrenciesNavigation extends Component
{
    public function __construct()
    {
        
    }

    public function render(): View|Closure|string
    {
        $currencies = Currencies::getNames();

        return view('components.frontend.currencies_navigation', compact('currencies'));
    }
}
