<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\PaymentGateway;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use App\DataTables\PaymentMethodsDataTable;
use App\Factories\PaymentGatewaysFactory;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Admin\PaymentMethodRequest;
use Cache;

class PaymentMethodController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(PaymentMethod::class, 'payment_method');
    }

    public function index(PaymentMethodsDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.payment_methods.index');
    }

    public function edit(PaymentMethod $payment_method)
    {
        $instance=PaymentGatewaysFactory::create($payment_method->name);

        $options=$instance->options();

        return view('admin.dashboard.payment_methods.edit',compact('payment_method','options'));
    }

    public function update(PaymentMethodRequest $request, PaymentMethod $payment_method)
    {
        $payment_method->update($request->validated());

        toastr()->success('PaymentMethod has been updated successfully!');

        return to_route('admin.payment_methods.index');
    }

    public function destroy(PaymentMethod $payment_method)
    {
        $payment_method->delete();

        if(request()->ajax()) return response('',Response::HTTP_NO_CONTENT);

        toastr()->success('PaymentMethod has been deleted successfully!');

        return back();
    }
}
