<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrdersDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Order::class, 'order');
    }

    public function index(OrdersDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.sections.orders.index');
    }

    public function show(Order $order)
    {
        $order=$order->load(['payment_method','user','package']);
        
        return view('admin.dashboard.sections.orders.show',compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();

        if(request()->ajax()) return response('Order deleted successfully',Response::HTTP_NO_CONTENT);

        toastr()->success('Order has been deleted successfully!');

        return back();
    }
}
