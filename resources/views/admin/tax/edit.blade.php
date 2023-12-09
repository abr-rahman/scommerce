<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Tax</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('taxs.update', $tax->id) }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                @method('PATCH')
                <div class="form-group mb-2">
                    <label for="">Tax Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Tax Name" value="{{ $tax->name }}" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Tax Type <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="type" value="{{ $tax->type }}" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary bg-primary">Save</button>
            </div>
        </form>
    </div>
</div>