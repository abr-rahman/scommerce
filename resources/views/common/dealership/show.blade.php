<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Dealer Account Details</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        @if (isset($user->profile_photo ))
                                            <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('uploads/profile/' . $user->profile_photo ) ?? $user->profile_photo }}" alt="User profile picture">
                                        @endif
                                    </div>
                                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                    <p class="text-muted text-center"><strong>Trade : </strong>{{ $dealership->trade_license_number }}</p>
                                </div>
                            </div>

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Details</h3>
                                </div>

                                <div class="card-body">
                                    <strong><i class="fas fa-phone mr-1"></i> Phone</strong>
                                    <p class="text-muted">
                                        {{ $dealership->phone }}
                                    </p>
                                    <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                                    <p class="text-muted">
                                        {{ $dealership->email }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Business Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $dealership->business_name }}" 
                                                            placeholder="Business Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Business Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $dealership->business_address }}" 
                                                            placeholder="Business Address">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">NID Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $dealership->nid_number }}" 
                                                            placeholder="NID Number">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">BIN Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $dealership->bin_number }}" 
                                                            placeholder="BIN Number">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">TIN Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $dealership->tin_number }}" placeholder="TIN Number">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Personal Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $dealership->p_address }}" placeholder="Personal Address">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Attachment</label>
                                                    <div class="col-sm-10">
                                                        @if (isset($dealership->attachment))
                                                            @foreach (json_decode($dealership->attachment, true) as $attachment)
                                                                <div class="product-image-thumb"><img src="{{ asset('uploads/dealership/' . $attachment) ?? asset($attachment) }}" width="100" alt="Dealership Attachment"></div>
                                                            @endforeach
                                                        @endif
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
                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                @if ($dealership->status == App\Enums\StatusEnum::Pending->value)
                    <div class=" float-right">
                        <a href="{{ route('dealerships.approve', $dealership->id) }}" class="btn btn-success">Approve</a>
                    </div>
                @endif
            </div>
    </div>
</div>

<script>
    function viewPreview(image) {
        image.preventDefault();
        console.log(image);
        document.getElementById('preview').src = URL.createObjectURL(image.target.files[0]);
    }
</script>
