@extends('layouts.admin-master')
@section('section')
    <div class="card">
        <div class="card-header">
            {{ __('Claim Warranty') }}
        </div>
        <div class="card-body">
            <x-datatable :dataTable="$dataTable"></x-datatable>
        </div>
    </div>
@endsection
@push('js')
<script>
    $('body').on('click', '.show-btn', function(e) {
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