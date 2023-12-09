@extends('layouts.admin-master')
@section('section')
    <div class="card">
        <div class="card-header">
            {{ __('Product Ledger') }}
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered stock-data">
                <thead>
                    <tr>
                        <th>{{ __('S/L') }}</th>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Product Name') }}</th>
                        {{-- <th class="text-success">{{ __('Stock In') }}</th> --}}
                        <th class="text-info">{{ __('Stock Out') }}</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-center">Total Stock Out</th>
                        <th></th>
                        {{-- <th></th> --}}
                    </tr>
                    <tr>
                        <th colspan="" class="h6 text-center font-weight-bold">Total Purchase Stock</th>
                        <th class="h5 text-center font-weight-bold">{{ $totalPurchaseQuantity }}</th>
                        <th colspan="" class="h6 text-center font-weight-bold">Total Current Stock</th>
                        <th class="h5 text-center font-weight-bold">{{ $totalQuantity }}</th>
                        {{-- <th>-</th> --}}
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
@push('js')
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
                "url": "{{ route('product.ledger') }}"
            },

            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'product_name',
                    name: 'product_name'
                },
                // {
                //     data: 'purchase_quantity',
                //     name: 'purchase_quantity'
                // },
                {
                    data: 'out_quantity',
                    name: 'out_quantity'
                },
            ],
            order: [
                [1, 'desc'],
            ],

            footerCallback: function(row, data, start, end, display) {
                var api = this.api();
                var intVal = function(i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i :
                        0;
                };

                var stockInTotal = api.column(3).data().reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
                // var stpckOutTotal = api.column(4).data().reduce(function(a, b) {
                //     return intVal(a) + intVal(b);
                // }, 0);

                $(api.column(3).footer()).html(stockInTotal);
                // $(api.column(4).footer()).html(stpckOutTotal);
            },
        });
    </script>
@endpush
