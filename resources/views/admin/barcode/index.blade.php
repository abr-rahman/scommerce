@extends('layouts.admin-master')
@section('section')
    <div>
        <div class="card">
            <div class="card-header">
                {{ __('QR Code') }}                    
            </div>
            <div class="card-body">
                <div class="container mt-4" style="display: grid; grid">
                    @foreach ($barcodes as $barcode)
                    <div class="mb-3">
                        {!! DNS2D::getBarcodeHTML($barcode->barcode_number,  'QRCODE', 3, 3); !!}
                        <p>{{ $barcode->barcode_number }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function create() {
                $.ajax({
                    url: "{{ route('brands.create') }}",
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
