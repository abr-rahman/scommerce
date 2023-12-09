@extends('layouts.admin-master')
@section('section')
    <div>
        <div class="card">
            <div class="card-header">
                    {{ __('News') }}        
                <a href="{{ route('news.create') }}" class="btn btn-success float-right">Create</a>     
            </div>
            <div class="card-body">
                <x-datatable :dataTable="$dataTable"></x-datatable>
            </div>
        </div>
    </div>

    @push('js')
        <script>
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
