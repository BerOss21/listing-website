@extends('admin.layouts.main')
@section('header')
<h1>Order page</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
    <div class="breadcrumb-item active">Order {{ $order->transaction_id }}</div>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="invoice" >
        <div class="invoice-print" id="invoice">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2>
                        <div class="invoice-number">Order {{ $order->transaction_id }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Billed To:</strong><br>
                                {{ $order->user->firstname }} {{ $order->user->lastname }}<br>
                                {{ $order->user->address }}<br>
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Payment Method:</strong><br>
                                {{ $order->payment_method->name }}<br>
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Order Date:</strong><br>
                                {{ $order->purchase_date->format('d/m/Y')}}<br><br>
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">All items here cannot be deleted.</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                            <tr>
                                <th data-width="40">#</th>
                                <th>Package</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Paid in</th>
                                <th class="text-right">Totals</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Mouse Wireless</td>
                                <td class="text-center">{{Currency::format($order->price)}}</td>
                                <td class="text-center">{{$order->paid_currency}}</td>
                                <td class="text-right">{{Currency::format($order->price)}}</td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <div class="col-lg-4 float-right text-right">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Total</div>
                                <div class="invoice-detail-value invoice-detail-value-lg">{{Currency::format($order->price)}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-md-right">
            <button class="btn btn-warning btn-icon icon-left btn-print"><i class="fas fa-print"></i> Print</button>
        </div>
    </div>
</div>
@endsection

@push('js')

<script>
    $(function(){
        $('.btn-print').on('click',function(){
            var printContent = document.getElementById('invoice').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
        })
    })
</script>

@endpush