@extends('frontend.dashboard.layouts.main')
@section('dashboard_content')
<div class="my_listing invoice" id="invoice">
    <div class="wsus__invoice_header">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__invoice_top">
                    <a class="invoice_logo" href="#">
                        <img src="{{asset('frontend/assets/images/logo.png')}}" alt="logo" class="img-fluid w-100">
                    </a>
                    <div class="wsus__invoice_number">
                        <h5>order#{{$order->transaction_id}}</h5>
                        <p>due to: {{ $order->purchase_date->format('d - M - Y') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-6">
                <div class="wsus__invoice_header_left">
                    <h5>Invoice To</h5>
                    <h6>{{ $order->user->firstname }} {{ $order->user->lastname }}</h6>
                    <a class="call_mail" href="mailto:{{ $order->user->email }}">{{ $order->user->email }}</a>
                    <a class="call_mail" href="callto:{{ $order->user->phone }}">{{ $order->user->phone }}</a>
                </div>
            </div>
        </div>
    </div>
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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="package">{{ $order->package->name }}</td>
                    <td class="p_date">{{ $order?->purchase_date->format('d/m/Y') }}</td>
                    <td class="e_date">{{ $order?->subscription?->expire_date?->format('d/m/Y') }}</td>
                    <td class="price">{{ Currency::format($order->paid_amount,$order->paid_currency) }}</td>
                    <td class="method">{{ $order->payment_method->name }}</td>
                    <td class="tr_id">{{ $order->transaction_id }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <button type="submit" class="read_btn btn-print">print</button>
</div>
@endsection


@push('js')

<script>
    $(function() {
        $('.btn-print').on('click', function() {
            var printContent = document.getElementById('invoice').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
        })
    })
</script>

@endpush