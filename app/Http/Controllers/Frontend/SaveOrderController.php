<?php

namespace App\Http\Controllers\Frontend;

use Throwable;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Factories\PaymentGatewaysFactory;
use Symfony\Component\HttpFoundation\Response;

class SaveOrderController extends Controller
{
    public function __invoke(Request $request, Package $package, PaymentMethod $method)
    {
        $instance = PaymentGatewaysFactory::create($method->name);
        $response = $instance->verify($request->get('token'));
dd($response);
        if (!auth('admin')->check() && (auth()->id() != Session::get("order_intent_{$response['base_data']['transaction_id']}"))) abort(Response::HTTP_UNAUTHORIZED);

        if ($response['base_data']['status'] == "APPROVED") 
        {
            DB::beginTransaction();
            try 
            {
                $order = auth()->user()->orders()->create([
                    'package_id' => $package->id,
                    'payment_method_id' => $method->id,
                    'transaction_id' => $response['base_data']['transaction_id'],
                    'username' => auth()->user()->email,
                    'package_name' => $package->name,
                    'payment_method_name' => $method->name,
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
            } 
            
            catch (Throwable $e) 
            {
                DB::rollBack();
                throw $e;
            }

            // Session::forget("order_intent_{$response['base_data']['transaction_id']}");
        }

        return to_route('pages.subscriptions.succeed');
    }
}
