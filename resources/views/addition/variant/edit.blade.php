<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Variant</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('variants.update', $bulk->id) }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                @method('PATCH')
                <div class="row">
                        <input type="hidden" name="id" value="{{ $bulk->id }}" id="id">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Variant Name <span class="text-danger">*</span></label>
                            <input type="text" name="variant_name" class="form-control" value="{{  $bulk->bulk_variant_name }}" placeholder="Enter variant name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Variant Value<span class="text-danger">*</span></label>
                                    @foreach ($variants as $item)
                                        <input type="text" name="variant_child[]" value="{{ $item->child_name }}" class="form-control" placeholder="Set variant value">
                                    @endforeach
                                    <input type="hidden" name="variant_child_ids[]" id="e_variant_child_id" value="">
                                </div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <div class="form-group mt-2">
                                    <a class="btn btn-sm btn-primary add_more_for_add_edit" href="#">+</a>
                                </div>
                            </div>
                        </div>

                        <div class="more_variant_child_area_edit">
                        </div>                                               
                        
                    </div>

                    <div class="col-md-2 mt-2">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="d-none"></label><br>
                            <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary bg-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    var add_more_index = 0;
        $(document).ready(function() {
            $('.add_more_for_add_edit').on('click', function(e) {
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

                $('.more_variant_child_area_edit').append(html);
            });
        });
    // delete add more field for adding
    $(document).on('click', '.delete_more_for_add', function(e) {
        var index = $(this).data('index');
        $('.more' + index).remove();
    })
</script>