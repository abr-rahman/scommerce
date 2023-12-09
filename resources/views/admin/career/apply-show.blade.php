<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Career Show</h4>
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
                                        @if (isset($carApply->photo ))
                                            <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('uploads/career/' . $carApply->photo ) }}" alt="User profile picture">
                                        @else 
                                            <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('uploads/default-profile-image.png') }}" alt="User profile picture">
                                        @endif
                                    </div>
                                    <h3 class="profile-username text-center">{{ $carApply->name }}</h3>
                                </div>
                            </div>

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Details</h3>
                                </div>

                                <div class="card-body">
                                    <strong><i class="fas fa-phone mr-1"></i> Phone</strong>
                                    <p class="text-muted">
                                        {{ $carApply->phone }}
                                    </p>
                                    <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                                    <p class="text-muted">
                                        {{ $carApply->email }}
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
                                                        class="col-sm-2 col-form-label">Department</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $carApply->department }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Gender</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $carApply->gender }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Gender</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $carApply->age }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Skills</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{!! $carApply->skills !!}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Why Do You Want To Join with Us</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $carApply->reason_of_join }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Which Things Sets You Apart From Other*</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $carApply->choos_reason }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">CV</label>
                                                    <div class="col-sm-10">
                                                        <a href="{{ route('download.cv', $carApply->id) }}" class="btn btn-sm btn-success" target="_blank">{{ __('Download CV') }}</a>
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
    </div>
</div>

<script>
    function viewPreview(image) {
        image.preventDefault();
        console.log(image);
        document.getElementById('preview').src = URL.createObjectURL(image.target.files[0]);
    }
</script>
