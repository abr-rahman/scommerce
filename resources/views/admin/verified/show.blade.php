<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Verified Details</h4>
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
                                                        class="col-sm-2 col-form-label">Verified Date</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $verified->created_at }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">User Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $verified->name }}"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Product Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $verified->product->product_name }}"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Shop Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $verified->shope_name }}" 
                                                            >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $verified->address }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">QR Code Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $verified->barcode_number }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">District</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" readonly value="{{ $verified->district }}" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Invoice</label>
                                                    <div class="col-sm-10">
                                                        <div class="product-image-thumb"><img src="{{ asset('uploads/verified/' . $verified->invoice_attachment) ?? null }}" width="100" alt="Invoice"></div> <br>
                                                        <a href="{{ route('download.verified.invoice', $verified->id) }}" class="btn btn-sm btn-success" target="_blank">{{ __('Download Invoice') }}</a>
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
