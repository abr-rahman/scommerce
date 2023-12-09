@extends('layouts.admin-master')
@section('section')
    <div class="card">
        <div class="card-header">
                {{ __('Product List') }}
            </div>
        <span class="text-center">Note: <span class="text-danger p-2">Please Wait atleast 1 min after entering once & <strong>(Max Entry 15000)</strong></span></span>
        <div class="card-body">
            <x-datatable :dataTable="$dataTable"></x-datatable>
        </div>
    </div>

    @push('js')
        <script>
            function create() {
                $.ajax({
                    url: "{{ route('products.create') }}",
                    success: function(html) {
                        $("#bodycontent").html(html);
                    }
                });
            }

            $('body').on('click', '#purchaseEntry', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('href'),
                    success: function(html) {
                        $('#modal').html(html).modal('show');
                    }
                });
            });
            </script>
    @endpush
@endsection
