<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{ __('Create Dealership') }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        
        <form action="{{ route('offline.customers.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group mb-2">
                    <label for="">{{ __('Customer Name') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Customer Name" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Business Name') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="business_name" placeholder="Business Name" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Business Address') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="business_address" placeholder="Business Address" required  autocomplete="business_address">
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Email Address') }} </label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email address">
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Phone Number') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter your phone number" required  autocomplete="phone">
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Trade License Number') }}</label>
                    <input type="text" class="form-control" name="trade_license_number" placeholder="Trade License Number" autocomplete="trade_license_number">
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('NID Number') }}</label>
                    <input type="text" class="form-control" name="nid_number" placeholder="NID Number" autocomplete="nid_number">
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('BIN Number') }}</label>
                    <input type="text" class="form-control" name="bin_number" placeholder="BIN Number" autocomplete="bin_number">
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('TIN Number') }}</label>
                    <input type="text" class="form-control" name="tin_number" placeholder="TIN Number" autocomplete="tin_number">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary bg-primary">Save</button>
            </div>
        </form>
    </div>
</div>