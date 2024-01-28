@extends('frontend.dashboard.layouts.main')
@section('dashboard_content')
<div class="my_listing p_xm_0">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="package">Package</th>
                    <th class="p_date">Purchase Date</th>
                    <th class="e_date">Expired Date</th>
                    <th class="price">Price</th>
                    <th class="method">Payment Method</th>
                    <th class="tr_id">Transaction Id</th>
                    <th class="status">status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td class="package">{{ $order->package->name }}</td>
                        <td class="p_date">{{ $order?->purchase_date->format('d/m/Y') }}</td>
                        <td class="e_date">{{ $order?->subscription?->expire_date?->format('d/m/Y') }}</td>
                        <td class="price">{{ Currency::format($order->paid_amount,$order->paid_currency) }}</td>
                        <td class="method">{{ $order->payment_method->name }}</td>
                        <td class="tr_id">{{ $order->transaction_id }}</td>
                        <td class="status"><a href="{{route('dashboard.orders.show',$order->transaction_id)}}"><i class="far fa-eye"></i></a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No order avaible</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection