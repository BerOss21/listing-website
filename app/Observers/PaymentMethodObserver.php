<?php

namespace App\Observers;

use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Storage;

class PaymentMethodObserver
{
    public function updated(PaymentMethod $payment_method): void
    {
        $this->deleteOldFiles($payment_method,'updated');
    }

    public function deleted(PaymentMethod $payment_method): void
    {
        $this->deleteOldFiles($payment_method,'deleted');
    }
    
    /**
     * 
     * @param \App\Models\PaymentMethod $method
     * @param string $method
     * @return void
     */
    protected function deleteOldFiles(PaymentMethod $payment_method,string $method) :void
    {

        $icon=$payment_method->getRawOriginal('icon');

        if(($payment_method->wasChanged('icon') || $method=='deleted') && $icon!='sections/payment_methods/icons/default.png' && Storage::disk('admin')->exists($icon))
        {
            Storage::disk('admin')->delete($icon);
        }
    }
}
