<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Create Sub-Category</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('sub-categories.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group mb-2">
                    <label for="">Select Category Name <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control" id="">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="">Sub-Category Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Sub-Category Name" required>
                </div>
                {{-- <div class="form-group mb-2">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" cols="5" rows="10"></textarea>
                </div> --}}
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary bg-primary">Save</button>
            </div>
        </form>
    </div>
</div>