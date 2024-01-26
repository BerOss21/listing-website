<?php


namespace App\Actions\Order;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Throwable;

class SaveOrder
{
    public function save($package,$response,$method)
    {
        DB::beginTransaction();
        try 
        {
            $order = auth()->user()->orders()->create([
                'package_id' => $package->id,
                'payment_method_id' => $method?->id,
                'transaction_id' => $response['base_data']['transaction_id'],
                'username' => auth()->user()->email,
                'package_name' => $package->name,
                'payment_method_name' => $method?->name,
                'base_amount' => $package->price,
                'base_currency' => config('settings.site_default_currency'),
                'paid_amount' => $response['base_data']['paid_amount'],
                'paid_currency' => $response['base_data']['paid_currency'],
                'response_content' => $response['content'],
                'purchase_date' => now()
            ]);

            $order->subscription()->updateOrCreate([], [
                'order_id' => $order->id,
                'purchase_date' => $order->purchase_date,
                'expire_date' => $package->number_of_days==-1?null:$order->purchase_date->addDays($package->number_of_days),
                'status' => 1
            ]);

            DB::commit();

            Session::forget("order_intent_{$response['base_data']['transaction_id']}");
        } 
        
        catch (Throwable $e) 
        {
            DB::rollBack();
            throw $e;
        }       
    }
}
