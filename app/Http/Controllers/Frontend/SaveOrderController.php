<?php

namespace App\Http\Controllers\Frontend;

use App\Actions\Order\SaveOrder;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Factories\PaymentGatewaysFactory;
use Symfony\Component\HttpFoundation\Response;

class SaveOrderController extends Controller
{
    public function __invoke(Request $request, Package $package,SaveOrder $action, ?PaymentMethod $method=null)
    {
        $instance = PaymentGatewaysFactory::create($method->name ?? 'free');

        $response = $instance->verify($request->get('token') ?? null);

        if ((!auth('admin')->check() && (auth()->id() != Session::get("order_intent_{$response['base_data']['transaction_id']}"))) && $method) abort(Response::HTTP_UNAUTHORIZED);

        if ($response['base_data']['status']) $action->save($package,$response,$method);   

        return to_route('pages.subscriptions.succeed');
    }
}
