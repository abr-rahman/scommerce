@extends('layouts.admin-master')
@section('section')
    <section class="content">
        <div class="container-fluid">
            <div class="row"  id="ajax-reload">
                <div class="col-md-6">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Create Size</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="border rounded p-2">
                                        <form method="POST" action="{{ route('sizes.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Size <span class="text-danger">*</span></label>
                                                                <input type="text" name="size" class="form-control" placeholder="Expected your size">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mt-2">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" class="d-none"></label><br>
                                                        <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card border-top mt-3">
                                        <div class="card-header">
                                            <h3 class="card-title">Size Table</h3>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-head-fixed text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Size</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($sizes as $item)
                                                        <tr>
                                                            <td>{{ $item->size }}</td>
                                                            <td>
                                                                <a href="{{ route('sizes.edit', $item->id) }}" class="p-2 text-info border edit-btn"> <i class="nav-icon fas fa-edit"></i> </a>
                                                                <a href="{{ route('sizes.destroy', $item->id) }}" class="p-2 text-danger delete-btn-reload border"> <i class="far fa-trash-alt"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Create Color</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="border rounded p-2">
                                        <form method="POST" action="{{ route('colors.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Color Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="color_name" class="form-control"
                                                            placeholder="Enter your color Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Color Code <span
                                                                class="text-danger">*</span></label>
                                                        <input type="color" name="color_code" class="form-control"
                                                            placeholder="Expected your color">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mt-2">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" class="d-none"></label><br>
                                                        <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card border-top mt-3">
                                        <div class="card-header">
                                            <h3 class="card-title">Color Table</h3>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-head-fixed text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Color Name</th>
                                                        <th>Color Code</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($colors as $item)
                                                        <tr>
                                                            <td>{{ $item->color_name }}</td>
                                                            <td style="color: {{ $item->color_code }}">{{ $item->color_code }}</td>
                                                            <td>
                                                                <a href="{{ route('colors.edit', $item->id) }}" class="p-2 text-info border edit-btn"> <i class="nav-icon fas fa-edit"></i> </a>
                                                                <a href="{{ route('colors.destroy', $item->id) }}" class="p-2 text-danger delete-btn-reload border"> <i class="far fa-trash-alt"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
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
                        // var html = '<div class="more_variant_child mt-2 more' + index + '">';
                        // html += '<div class="row">';
                        // html += '<div class="col-10"> ';
                        // html +=
                        //     '<input required type="text" name="variant_child[]" class="form-control " placeholder="Variant child"/>';
                        // html += '</div>';

                        // html += '<div class="col-2 text-end">';
                        // html += '<a class="btn btn-sm btn-danger delete_more_for_add" data-index="' + index + '" href="#">×</a>';
                        // html += '</div>';
                        // html += '</div>';
                        // html += '</div>';

                        var html = '<div class="row more_variant_child mt-2 more' + index + '">';

                        html +=  '    <div class="col-md-8 mt-2">';
                        html += '        <div class="form-group">';
                        html += '            <input type="text" name="size" class="form-control" placeholder="Expected your size">';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-4">';
                        html += '        <div class="form-group">';
                        html += '           <a class="btn btn-sm btn-danger delete_more_for_add" data-index="' + index + '" href="#">×</a>';
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
        </script>
    @endpush
@endsection
