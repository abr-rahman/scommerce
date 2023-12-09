@extends('layouts.admin-master')
@section('section')
        <div class="print_template hidden">
            <table>
                <tr style="display: flex; justify-content: center; flex-wrap: wrap; grid-gap: 10px;">
                    @foreach ($qrcodes as $code)
                    <td>
                        {{ QrCode::margin(3)->size(80)->generate($baseUrl.$code->barcode_number) }}
                        <p style="margin-left: 5px;">{{ $code->serial_number }}</p>
                    </td>
                    @endforeach
                </tr>
            </table> 
        </div>
@endsection
@push('js')
    <script src="{{ asset('asset/print_this/printThis.js') }}"></script>
    <script>
        window.onload = function(e) {
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
        };
    </script>
@endpush
