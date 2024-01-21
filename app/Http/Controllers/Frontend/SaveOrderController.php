<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Payment\Paypal;
use Illuminate\Http\Request;

class SaveOrderController extends Controller
{
    public function __invoke(Request $request,Paypal $paypal)
    {
        $response=$paypal->verify($request->get('token'));
dd('responses',$response->json());
        // $order=Order::firstOrCreate([
        //     'transaction_id'=>$response['id'],
        //     'purchase_date'=>$response['create_time'],
        // ],
        // [

        // ]);
        
        // dd("response",$res->json());
    }
}
