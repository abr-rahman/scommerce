@extends('layouts.admin-master')
@section('section')
    <div>
        <div class="card">
            <div class="card-header">
                {{ __('Sales Report') }}
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-data">
                    <thead>
                        <tr>
                            <td>{{ __('Date') }}</td>
                            <td>{{ __('Product') }}</td>
                            <td>{{ __('Quantity') }}</td>
                            <td>{{ __('User Amount') }}</td>
                            <td>{{ __('Dea: Amount') }}</td>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Total : </th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>                    
                </table>
            </div>
            <div class="card-footer">
                <p>Total Shipping Charge : <strong>{{ $totalShippingCharge }}</strong></p>
                <p>Total Discount Amount : <strong>{{ $totalDiscount }}</strong></p>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

        var orders_table = $('.table-data').DataTable({
            "processing": true,
            "serverSide": true,
            dom: "lBfrtip",
            "pageLength": parseInt("50"),
            "lengthMenu": [
                [10, 25, 50, 100, 500, 1000, -1],
                [10, 25, 50, 100, 500, 1000, "All"]
            ],
            "ajax": {
                "url": "{{ route('report.sales') }}"
            },

            columns: [
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'product',
                    name: 'product'
                },
                {
                    data: 'quantity',
                    name: 'quantity'
                },
                {
                    data: 'userAmount',
                    name: 'userAmount'
                },
                {
                    data: 'dealerAmount',
                    name: 'dealerAmount'
                },
            ],

            footerCallback: function (row, data, start, end, display) {
                var api = this.api();
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };

                var quantityTotal = api.column(2).data().reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                var createdAtTotal = api.column(3).data().reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                var dealAmTotal = api.column(4).data().reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                $(api.column(2).footer()).html(quantityTotal);
                $(api.column(3).footer()).html(createdAtTotal);
                $(api.column(4).footer()).html(dealAmTotal);
            },

        });

    </script>
@endpush

