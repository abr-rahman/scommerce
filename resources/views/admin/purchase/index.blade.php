@extends('layouts.admin-master')
@section('section')
        <div class="print_template hidden">
            <div style="margin: 40px;">
                <style>
                    #customers {
                        font-family: Arial, Helvetica, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }
    
                    #customers td,
                    #customers th {
                        border: 1px solid #ddd;
                        padding: 8px;
                    }
    
                    #customers tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }
    
                    #customers tr:hover {
                        background-color: #ddd;
                    }
    
                    #customers th {
                        padding-top: 12px;
                        padding-bottom: 12px;
                        text-align: left;
                        background-color: #04AA6D;
                        color: white;
                    }
                </style>
                @include('admin.stock.print-header')
                <h1 class="text-center" style="font-size: 25px; margin-bottom: 10px; font-weight: bold">Purchase List</h1>
                <table id="customers">
                    <thead>
                        <tr>
                            <th style="font-weight: bold; border: 1px solid #000000; color: #000000; width: 80px;">{{ __('S/L') }}</th>
                            <th style="font-weight: bold; border: 1px solid #000000; color: #000000; width: 80px;">{{ __('Invoice Number') }}</th>
                            <th style="font-weight: bold; border: 1px solid #000000; color: #000000;">{{ __('Product Name') }}</th>
                            <th style="font-weight: bold; border: 1px solid #000000; color: #000000; width: 100px;">{{ __('Quantity') }}</th>
                            <th style="font-weight: bold; border: 1px solid #000000; color: #000000; width: 150px;">{{ __('Date') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $incrementedValue = 1;
                        @endphp
                        @foreach ($purchases as $purchase)
                        <tr>
                            <td style="border: 1px solid #000000; width: 80px;">{{ $incrementedValue++; }}</td>
                            <td style="border: 1px solid #000000;">{{ $purchase->invoice_number }}</td>
                            <td style="border: 1px solid #000000;">{{ $purchase->product->product_name }}</td>
                            <td style="border: 1px solid #000000; width: 100px;">{{ $purchase->quantity }}</td>
                            <td style="border: 1px solid #000000; width: 150px;">{{ $purchase->created_at->format('d-M-Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                {{ __('Stock History') }}
                <button type="button" class="btn bg-info btn-success float-right print_btn mb-2">Print</button>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered stock-data">
                    <thead>
                        <tr>
                            <th>{{ __('S/L') }}</th>
                            <th>{{ __('Invoice Number') }}</th>
                            <th>{{ __('Product Name') }}</th>
                            <th>{{ __('Quantity') }}</th>
                            <th>{{ __('QR') }}</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-center">Total Stock</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
@endsection
@push('js')
    <script src="{{ asset('asset/print_this/printThis.js') }}"></script>
    <script>
        var stock_table = $('.stock-data').DataTable({
            "processing": true,
            "serverSide": true,
            dom: "lBfrtip",
            "pageLength": parseInt("50"),
            "lengthMenu": [
                [10, 25, 50, 100, 500, 1000, -1],
                [10, 25, 50, 100, 500, 1000, "All"]
            ],
            "ajax": {
                "url": "{{ route('purchase.index') }}"
            },

            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'invoice_number',
                    name: 'invoice_number'
                },
                {
                    data: 'product_name',
                    name: 'product_name'
                },
                {
                    data: 'quantity',
                    name: 'quantity'
                },
                {
                    data: 'qr_code',
                    name: 'qr_code'
                },
            ],

            footerCallback: function (row, data, start, end, display) {
                var api = this.api();
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };
                var dealAmTotal = api.column(3).data().reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                $(api.column(3).footer()).html(dealAmTotal);
            },
        });

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
