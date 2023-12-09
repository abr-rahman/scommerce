@extends('layouts.admin-master')
@section('section')
    <section class="content">
        <div class="container-fluid">
            <div class="row" id="ajax-reload">
                <div class="col-md-12">
                    <div class="card card-dark" id="add_form">
                        <div class="card-header">
                            <h3 class="card-title">Create Product Inventory </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="border rounded p-2">
                                        <form method="POST" action="{{ route('inventory.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="row">
                                                {{-- <div class="col-md-4">
                                                    <label for="exampleInputEmail1">Select Your Size</label>
                                                    <div class="form-group">
                                                        <select name="size_id" id="" class="form-control">
                                                            <option value="">Select Your Size</option>
                                                            @foreach ($sizes as $item)
                                                                <option value="{{ $item->id }}"><b>{{ $item->size }}</b></option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="exampleInputEmail1">Select Color</label>
                                                    <select name="color_id" id="" class="form-control">
                                                        <option value="">Select Your Color</option>
                                                        @foreach ($colors as $item)
                                                            <option value="{{ $item->id }}" style="color: {{ $item->color_code }}"><b>{{ $item->color_name }}</b></option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
                                                <div class="col-md-3">
                                                    <div class="form-group ">
                                                        <label for="exampleInputEmail1">Add Quantity</label>
                                                        <input type="text" class="form-control" name="quantity"
                                                            placeholder="Add Quantity" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 mt-2">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" class="d-none"></label><br>
                                                        <button type="submit"
                                                            class="btn btn-success bg-success float-right">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-dark d-none" id="edit_form">

                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product = {{ $product->product_name }}</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S/L</th>
                                        {{-- <th>Size</th>
                                        <th>Color</th> --}}
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total_market_value = 0;
                                    @endphp
                                    @foreach ($inventory as $item)
                                    @php
                                        $total_market_value += ($product->userPrice->regular_price * $item->quantity);
                                    @endphp
                                        <tr>
                                            <td>{{ $loop->index +1 }}</td>
                                            {{-- <td>{{ $item->size->size ?? null }}</td>
                                            <td style="color: {{ $item->color->color_code ?? null }}">{{ $item->color->color_name ?? null }}</td> --}}
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{$item->quantity * $product->userPrice->regular_price }}</td>
                                            <td>
                                                <a href="{{ route('inventory.edit', $item->id) }}" id="edit" class="btn btn-success btn-sm">Edit</a>
                                                <a href="{{ route('inventory.destroy', $item->id) }}" id="delete" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        {{-- <th></th>
                                        <th></th> --}}
                                        <th></th>
                                        <td><strong>{{ $inventory->sum('quantity') }}</strong></td>
                                        <td><strong>{{ $total_market_value }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <form id="deleted_form" action="" method="post">
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('js')
        <script>
            var add_more_index = 0;
            $(document).ready(function() {
                $('.add_more_for_add').on('click', function(e) {
                    e.preventDefault();
                    var index = add_more_index++;
                    var html = '<div class="row more_variant_child mt-2 more' + index + '">';
                    html += '    <div class="col-md-8 mt-2">';
                    html += '        <div class="form-group">';
                    html +=
                        '            <input type="text" name="size" class="form-control" placeholder="Expected your size">';
                    html += '        </div>';
                    html += '    </div>';
                    html += '    <div class="col-md-4">';
                    html += '        <div class="form-group">';
                    html += '           <a class="btn btn-sm btn-danger delete_more_for_add" data-index="' +
                        index + '" href="#">×</a>';
                    html += '        </div>';
                    html += '    </div>';
                    html += '    </div>';

                    $('.more_variant_child_area').append(html);
                });
            });
            // delete add more field for adding
            $(document).on('click', '.delete_more_for_add', function(e) {
                var index = $(this).data('index');
                $('.more' + index).remove();
            })

            $('body').on('click', '.edit-btn', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('href'),
                    success: function(html) {
                        $('#modal').html(html).modal('show');
                    }
                });
            });

            // pass editable data to edit modal fields
            $(document).on('click', '#edit', function(e){
                e.preventDefault();
                var url = $(this).attr('href');

                $.ajax({
                    url: url,
                    type: 'get',
                    success: function(data) {
                        $('.loading_button').hide();
                        $('#edit_form').html(data);
                        $('#add_form').hide();
                        $('#edit_form').show();
                        $('#edit_form').removeClass('d-none');
                    }
                });
            });
            // edit Unit by ajax
        $(document).on('submit', '#edit_inventory_form', function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var request = $(this).serialize();
            $.ajax({
                url: url,
                type: 'POST',
                data: request,
                success: function(data) {
                    toastr.success(data);
                    location.reload();
                    $('#add_form').show();
                    $('#edit_form').hide();
                },
                error: function(err) {
                    $('.loading_button').hide();
                    $('.error').html('');
                    $.each(err.responseJSON.errors, function(key, error) {
                        $('.error_e_' + key + '').html(error[0]);
                    });
                }
            });
        });

        $(document).on('click', '#delete',function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $('#deleted_form').attr('action', url);
            $.confirm({
                'title': 'Confirmation',
                'content': 'Are you sure?',
                'buttons': {
                    'Yes': {'class': 'yes btn-danger','action': function() {$('#deleted_form').submit();}},
                    'No': {'class': 'no btn-modal-primary','action': function() {console.log('Deleted canceled.');}}
                }
            });
        });
        </script>
    @endpush
@endsection
