@extends('layouts.admin-master')
@section('section')
    <section class="content">
        <div class="container-fluid">
            <div class="row"  id="ajax-reload">
                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Create Variants</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="border rounded p-2 ">
                                        <form method="POST" action="{{ route('variants.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Variant Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="variant_name" class="form-control" placeholder="Enter variant name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Variant Value<span class="text-danger">*</span></label>
                                                                <input type="text" name="variant_child[]" class="form-control" placeholder="Set variant value">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mt-4">
                                                            <div class="form-group mt-2">
                                                                <a class="btn btn-sm btn-primary add_more_for_add" href="#">+</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="more_variant_child_area">
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
                                </div>
                                <div class="col-md-6">
                                    <div class="card border-top">
                                        <div class="card-header">
                                            <h3 class="card-title">Variant Table</h3>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-head-fixed text-nowrap" id="ajax-delete-reload">
                                                <thead>
                                                    <tr>
                                                        <th class="text-start">S/L</th>
                                                        <th class="text-start">Variant Name</th>
                                                        <th class="text-start">Variant Value</th>
                                                        <th class="text-start">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($variants as $variant)
                                                        <tr data-info="{{ $variant }}">
                                                            <td class="text-start">{{ $loop->index + 1 }}</td> 
                                                            <td class="text-start">{{ $variant->bulk_variant_name }}</td> 
                                                            <td class="text-start">
                                                                @foreach ($variant->bulk_variant_child as $variant_child)
                                                                    {{ $variant_child->child_name.' ,' }}
                                                                @endforeach
                                                            </td> 
                                                            <td class="text-start"> 
                                                                <a href="{{ route('variants.edit', $variant->id) }}" class="p-2 text-info border edit-btn"> <i class="nav-icon fas fa-edit"></i> </a>
                                                                {{-- <a href="" class="p-2 text-info border edit-btn" id="edit"> <i class="nav-icon fas fa-edit"></i> </a> --}}
                                                                <a href="{{ route('variants.destroy', $variant->id) }}" class="p-2 text-danger delete-method-delete border"> <i class="far fa-trash-alt"></i></a>
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
                        var html = '<div class="row more_variant_child mt-2 more' + index + '">';
                        html +=  '    <div class="col-md-8 mt-2">';
                        html += '        <div class="form-group">';
                        html += '            <input type="text" name="variant_child[]" class="form-control" placeholder="Set variant value">';
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
