<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Order::class, 'order');
    }

    public function index()
    {
        $orders=auth()->user()->orders()->with(['package','payment_method','subscription'])->latest()->get();

        return view('frontend.dashboard.orders.index',compact('orders'));
    }

    public function show(Order $order)
    {
        $order=$order->load(['payment_method','user','package','subscription']);

        return view('frontend.dashboard.orders.show',compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();

        if(request()->ajax()) return response('Order deleted successfully',Response::HTTP_NO_CONTENT);

        toastr()->success('Order has been deleted successfully!');

        return back();
    }
}
