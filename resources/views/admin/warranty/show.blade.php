<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Warranty Claim Details</h4>
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
                                                        class="col-sm-2 col-form-label">Warranty Claim Date</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $warranty->created_at }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">User Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $warranty->name }}"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Product Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $warranty->product->product_name }}"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $warranty->phone }}" 
                                                            >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Description</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $warranty->message }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Attachment</label>
                                                    <div class="col-sm-10">
                                                        <div class="product-image-thumb"><img src="{{ asset('uploads/warranty/' . $warranty->attachments) ?? null }}" width="100" alt="Attach"></div> <br>
                                                        <a href="{{ route('download.warranty.attach', $warranty->id) }}" class="btn btn-sm btn-success" target="_blank">{{ __('Download Attach') }}</a>
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
