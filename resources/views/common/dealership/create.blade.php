<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{ __('Create Dealership') }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('dealerships.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group mb-2">
                    <label for="">{{ __('Business Name') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="business_name" placeholder="Business Name" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Business Address') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="business_address" placeholder="Business Address" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Dealer Name') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Your name" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email address" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Phone Number') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Trade License Number') }}</label>
                    <input type="text" class="form-control" name="trade_license_number" placeholder="Trade License Number" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">{{ __('Attachment (NID, TIN, Trade (Photos))') }} </label>
                    <input type="file" class="form-control" name="attachment">
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" required autocomplete="new-password" />
                    {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
    
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
    
                    <input id="password_confirmation" class="form-control" placeholder="Retype password" type="password" name="password_confirmation" required autocomplete="new-password" />
                    {{-- <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
    
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
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