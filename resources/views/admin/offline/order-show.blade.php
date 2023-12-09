@extends('layouts.admin-master')
@section('section')
    <section class="content">
        <div class="container-fluid">
            {{-- print area start --}}
            <div class="print_template hidden">
                <style>
                    .center {
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                    }
                    .brand-border {
                        border: 1px solid #ff9900 !important;
                    }
                    .border-top-none {
                        border-top: none !important;
                    }
                </style>
                <div style="margin: 40px">
                    <div class="heading_area">
                        <h1 style="text-align: center; font-weight: 800; font-size: 30px;">{{ $siteSettings->first()->business_name }}</h1>
                        <div class="" style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 20px; border-bottom: 1px solid #ff9900 !important;">
                            <div class="mt-5">
                                <div style="display: flex; align-items: center; gap: 5px;">
                                    <strong style="font-size: 15px;">{{ $siteSettings->first()->address_one }}</strong>
                                </div>
                                <div style="display: flex; align-items: center; gap: 5px;">
                                    <strong style="font-size: 15px;">{{ $siteSettings->first()->phone_one }} | {{ $siteSettings->first()->support_email }}</strong>
                                </div>
                                <div style="display: flex;">
                                    <strong style="font-size: 15px;">www.salamatinnovation.com</strong>
                                </div>
                            </div>
                            <img class="center" style="width: 250px; font-weight: 800; font-size: 30px; margin-top: 45px; height: 52px;" src="{{ asset('uploads/logo/'. $siteSettings->first()->logo) ?? asset('frontend/images/logo.png')  }}" alt="logo">
                        </div>
                        <div class="" style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ff9900 !important;">
                            <address class="py-3" style="">
                                <h2>Bill To</h2>
                                <strong>Name : </strong>{{ $order->customerName->name }}<br>
                                <strong>Business Name : </strong>{{ $order->customerName->business_name }}<br>
                                <strong>Phone : </strong>{{ $order->customerName->phone }}<br>
                                <strong>Email: </strong>{{ $order->customerName->email }} <br>
                                <strong>Business Address : </strong>{{ $order->customerName->business_address }}<br>
                            </address>
                            <address class="py-3 mb-5" style="">
                                <strong>Date : </strong>{{ $order->created_at }} <br>
                                <strong>Invoice No : </strong>{{ $order->invoice_number }} <br>
                            </address>
                        </div>
                    </div>
                    <div style="border-bottom: 1px solid #ff9900; margin-bottom: 20px;">
                    </div>           
                    <h1 class="text-center" style="font-size: 25px; margin-bottom: 20px; font-weight: bold">Order Invoice</h1>
                    <div class="col-12 table-responsive">
                        <table class="table table-striped" class="brand-border">
                            <thead>
                                <tr>
                                    <th class="brand-border">Product</th>
                                    <th class="brand-border">Price</th>
                                    <th class="brand-border">Qty</th>
                                    <th class="brand-border">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderList as $orderItem)
                                <tr class="brand-border">
                                    <td class="brand-border">{{ $orderItem->product->product_name }}</td>
                                    <td class="brand-border">{{ $orderItem->product_price }}</td>
                                    <td class="brand-border">{{ $orderItem->quantity }}</td>
                                    <td class="font-weight-bold brand-border"><strong>&#2547;.</strong>{{ $orderItem->quantity * $orderItem->product_price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="brand-border">
                                <tr style="border-top: 2px solid #ff9900">
                                    <td class="border-top-none" colspan="2">Note : </td>
                                    <td class="font-weight-bold brand-border">Subtotal:</td>
                                    <td class="font-weight-bold brand-border"><strong>&#2547;.</strong> {{ $order->sub_total }}</td>
                                </tr>
                                <tr>
                                    <td class="border-top-none" colspan="2" ></td>
                                    <td class="font-weight-bold brand-border">Grand Total:</td>
                                    <td class="font-weight-bold brand-border"><strong>&#2547;.</strong> {{ $order->grand_total }}</td>
                                </tr>
                                <tr>
                                    <td class="border-top-none" colspan="2" ></td>
                                    <td class="font-weight-bold brand-border">Paid:</td>
                                    <td class="font-weight-bold brand-border"><strong>&#2547;.</strong> {{ $order->payable_amount }}</td>
                                </tr>
                                <tr>
                                    <td class="border-top-none" colspan="2" ></td>
                                    <td class="font-weight-bold brand-border">Due:</td>
                                    <td class="font-weight-bold brand-border"><strong>&#2547;.</strong> {{ $order->due_amount }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <h2 class="mt-4 text-center h-1 font-weight-bold">Thank You For Your Purchase</h2>
                </div>
            </div>
            {{-- print area end --}}
            <div class="row">
                <div class="col-12">
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <strong>Date:</strong> <small> {{ \Carbon\Carbon::now() }}</small>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                From
                                <address>
                                    <strong>Address: </strong>{{ $siteSettings->first()->address_one }}<br>
                                    <strong>Phone: </strong> {{ $siteSettings->first()->phone_one }}<br>
                                    <strong>Email: </strong> {{ $siteSettings->first()->support_email }}
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped border">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderList as $orderItem)
                                        <tr>
                                            <td>{{ $orderItem->product->product_name }}</td>
                                            <td>{{ $orderItem->product_price }}</td>
                                            <td>{{ $orderItem->quantity }}</td>
                                            <td class="font-weight-bold"><strong>&#2547;.</strong> {{ $orderItem->quantity * $orderItem->product_price }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr style="border-top: 2px solid;">
                                            <td colspan="2"></td>
                                            <td class="font-weight-bold">Subtotal:</td>
                                            <td class="font-weight-bold"><strong>&#2547;.</strong> {{ $order->sub_total }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" ></td>
                                            <td class="font-weight-bold">Grand Total:</td>
                                            <td class="font-weight-bold"><strong>&#2547;.</strong> {{ $order->grand_total }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" ></td>
                                            <td class="font-weight-bold">Paid:</td>
                                            <td class="font-weight-bold"><strong>&#2547;.</strong> {{ $order->payable_amount }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" ></td>
                                            <td class="font-weight-bold">Due:</td>
                                            <td class="font-weight-bold"><strong>&#2547;.</strong> {{ $order->due_amount }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="invoice-print.html" target="_blank" class="btn btn-default print_btn float-right"><i
                                        class="fas fa-print"></i> Print</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="{{ asset('asset/print_this/printThis.js') }}"></script>
    <script>
        $(document).on('click', '.print_btn', function(e) {
            e.preventDefault();
            var body = $('.print_template').html();
            var header = $('.heading_area').html();
            $(body).printThis({
                debug: false,
                importCSS: true,
                importStyle: true,
                removeInline: false,
                printDelay: 800,
                header: null,
                footer: null,
            });
        });
    </script>
@endpush