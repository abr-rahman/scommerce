<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Customer</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('dealerships.update', $dealership->id) }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                @method('PATCH')
                <div class="form-group mb-2">
                    <label for="">{{ __('Business Name') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ $dealership->business_name }}" name="business_name" placeholder="Business Name" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Business Address') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ $dealership->business_address }}" name="business_address" placeholder="Business Address" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Dealer Name') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ $user->name }}" name="name" placeholder="Your name" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" value="{{ $dealership->email }}" name="email" placeholder="Enter your email address" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Phone Number') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ $dealership->phone }}" name="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Trade License Number') }}</label>
                    <input type="text" class="form-control" value="{{ $dealership->trade_license_number }}" name="trade_license_number" placeholder="Trade License Number" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Attachment (NID, TIN, Trade (Photos))') }}</label>
                    <input type="file" class="form-control" value="{{ $dealership->attachment }}" name="attachment">
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
    function viewPreview(image) {
        image.preventDefault();
        console.log(image);
        document.getElementById('preview').src = URL.createObjectURL(image.target.files[0]);
    }
</script>