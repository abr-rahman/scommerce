@extends('layouts.admin-master')
@section('section')
    <div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        {{ __('Sales Report') }}
                    </div>
                    <div class="col-2">
                        <select id="filterSelect" class="form-control">
                            <option value="">Select by Filter</option>
                            <option value="user">User</option>
                            <option value="dealer">Dealer</option>
                            <option value="7">7 Days</option>
                            <option value="15">15 Days</option>
                            <option value="30">30 Days</option>
                        </select>         
                    </div>
                </div>
            </div>

            <div class="card-body" id="filteredResults">
                <table class="table table-sm table-bordered table-data">
                    <thead>
                        <tr>
                            <td>{{ __('Date') }}</td>
                            <td>{{ __('Action') }}</td>
                            <td>{{ __('Discount') }}</td>
                            <td>{{ __('Sub Total') }}</td>
                            <td>{{ __('Shipping Charge') }}</td>
                            <td>{{ __('Grand Total') }}</td>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Total : </th>
                            <th></th>
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
                    data: 'action',
                    name: 'action'
                },
                {
                    data: 'discount_amount',
                    name: 'discount_amount'
                },
                {
                    data: 'sub_total',
                    name: 'sub_total'
                },
                {
                    data: 'shipping_charge',
                    name: 'shipping_charge'
                },
                {
                    data: 'grand_total',
                    name: 'grand_total'
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
                var grandAmTotal = api.column(5).data().reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

                $(api.column(2).footer()).html(quantityTotal);
                $(api.column(3).footer()).html(createdAtTotal);
                $(api.column(4).footer()).html(dealAmTotal);
                $(api.column(5).footer()).html(grandAmTotal);
            },

        });
        $('body').on('click', '.show-btn', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('href'),
                success: function(html) {
                    $('#modal').html(html).modal('show');
                }
            });
        });

        // $(document).ready(function () {
        $('body').on('change', '#filterSelect', function(e) {
            var selectedOption = $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{ route('filter.route') }}",
                data: { filter: selectedOption },
                success: function (data) {
                    console.log(data);

                    var tableBody = $('#filteredResults table tbody');
                    tableBody.empty(); // Clear previous rows

                    if (data.length > 0) {
                        $.each(data, function (index, item) {
                            var row = $('<tr>');
                            row.append('<td>' + item.created_at + '</td>');
                            row.append('<td>' +
                                '<div class="dropdown">' +
                                '<button class="btn btn-secondary dropdown-toggle bg-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>' +
                                '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">' +
                                '<a class="dropdown-item border show-btn" href="/admin/report/show/' + item.id + '">View Report</a>' +
                                '</div>' +
                                '</div>' +
                                '</td>');
                            row.append('<td>' + item.discount_amount + '</td>');
                            row.append('<td>' + item.sub_total + '</td>');
                            row.append('<td>' + item.shipping_charge + '</td>');
                            row.append('<td>' + item.grand_total + '</td>');

                            tableBody.append(row);
                        });

                    } else {
                        tableBody.html('<tr><td colspan="6">No results found.</td></tr>');
                    }
                },
            });
        });


    </script>
@endpush

