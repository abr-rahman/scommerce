@extends('layouts.admin-master')
@section('section')
    <div>
        <div class="card">
            <div class="card-header">
                {{ __('Sub-Category') }}                    
            </div>
            <div class="card-body">
                <x-datatable :dataTable="$dataTable"></x-datatable>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function create() {
                $.ajax({
                    url: "{{ route('sub-categories.create') }}",
                    success: function(html) {
                        $('#modal').html(html).modal('show');
                    }
                });
            }

            $('body').on('click', '.edit-btn', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('href'),
                    success: function(html) {
                        $('#modal').html(html).modal('show');
                    }
                });
            });

            $(document).on('click', '#check_status', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.confirm({
                    title: 'Confirmation!',
                    content: 'Are you sure?',
                    buttons: {
                        confirm: function() {
                            $.ajax({
                                url: url,
                                type: 'GET',
                                success: function(data) {
                                    toastr.success(data);
                                    $('.dataTable').DataTable().ajax.reload();
                                }
                            });
                        },
                        somethingElse: {
                            text: 'Cancel',
                            btnClass: 'btn-blue',
                            keys: ['enter', 'shift'],
                        },
                    }
                });
            });
        </script>
    @endpush
@endsection




{{-- @extends('layouts.admin-master')
@section('section')
    <div class="card">
        <div class="card-header">
            {{ __('Sub-Category') }}
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-data">
                <thead>
                    <tr>
                        <td>{{ __('Category') }}</td>
                        <td>{{ __('Name') }}</td>
                        <td>{{ __('Description') }}</td>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
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
                "url": "{{ route('sub-categories.index') }}",
                "data": function(d) {
                    d.from_date = $('#from_date').val();
                    d.to_date = $('#to_date').val();
                }
            },

            columns: [
                {
                    data: 'category_id',
                    name: 'category',
                    className: 'fw-bold'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'description',
                    name: 'description',
                    className: 'fw-bold'
                },
                
            ],
            fnDrawCallback: function() {

                // var total_ordered_qty = sum_table_col($('.data_tbl'), 'total_ordered_qty');
                // $('#total_ordered_qty').text(bdFormat(total_ordered_qty));

                $('.data_preloader').hide();
            }
        });
    </script>
@endpush --}}