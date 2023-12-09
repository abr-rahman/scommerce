<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Create Supplier</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group mb-2">
                    <label for="">Supplier Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Supplier Name" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Supplier Phone Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone" placeholder="Supplier Phone Number">
                </div>
                <div class="form-group mb-2">
                    <label for="">NID Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nid_number" placeholder="NID Number">
                </div>
                <div class="form-group mb-2">
                    <label for="">Supplier Email Address </label>
                    <input type="text" class="form-control" name="email" placeholder="Enter supplier email address">
                </div>
                <div class="form-group mb-2">
                    <label for="">Supplier Address </label>
                    <input type="text" class="form-control" name="address" placeholder="Enter supplier address">
                </div>
                <div class="form-group mb-2">
                    <label for="">Supplier City </label>
                    <input type="text" class="form-control" name="city" placeholder="Enter supplier City">
                </div>
                <div class="form-group mb-2">
                    <label for="">Supplier Country </label>
                    <input type="text" class="form-control" name="country" placeholder="Enter supplier Country">
                </div>
                <div class="form-group mb-2">
                    <label for="">Zip/Postal Code </label>
                    <input type="text" class="form-control" name="zip_code" placeholder="Zip/Postal Code">
                </div>
                <div class="form-group mb-2">
                    <label for="">Supplier Group </label>
                    <input type="text" class="form-control" name="group" placeholder="Supplier Group">
                </div>
                <div class="form-group mb-2">
                    <label for="">Supplier Land-Mark </label>
                    <input type="text" class="form-control" name="land_mark" placeholder="Supplier Land-Mark">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary bg-primary">Save</button>
            </div>
        </form>
    </div>
</div>