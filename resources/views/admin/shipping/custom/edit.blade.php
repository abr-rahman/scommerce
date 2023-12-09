
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Shipping</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('custom-shippings.update', $customShipping->id) }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                @method('PATCH')
                <div class="form-group mb-2">
                    <label for="">Shipping Area Name</label>
                    <input type="text" class="form-control" value="{{ $customShipping->area_name }}" name="area_name" placeholder="Shipping Area Name" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Shipping Charge</label>
                    <input type="text" class="form-control" value="{{ $customShipping->charge }}" name="charge" placeholder="Shipping Charge" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary bg-primary">Save</button>
            </div>
        </form>
    </div>
</div>