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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Customer Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $offlineCustomer->name }}" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Business Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $offlineCustomer->business_name }}" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Business Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $offlineCustomer->business_address }}" 
                                                            placeholder="Business Address">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $offlineCustomer->email }}" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Phone Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $offlineCustomer->phone }}" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Trade License Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $offlineCustomer->trade_license_number }}" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">NID Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $offlineCustomer->nid_number }}" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">BIN Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $offlineCustomer->bin_number }}" 
                                                            placeholder="BIN Number">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">TIN Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $offlineCustomer->tin_number }}" placeholder="TIN Number">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Personal Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $offlineCustomer->p_address }}" placeholder="Personal Address">
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
