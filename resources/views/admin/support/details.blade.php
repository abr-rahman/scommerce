<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Support Details</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Subject</label>
                                                    <div class="col-sm-10">
                                                        <p>{{ $details->subject }}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Support Details</label>
                                                    <div class="col-sm-10">
                                                        <p>{!! $details->description !!}</p>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group row">
                                                    <label for="inputEmail"
                                                        class="col-sm-2 col-form-label">Attachment</label>
                                                    <div class="col-sm-10">
                                                        <img src="{{ asset('uploads/support/' . $details->attachment ) }}" alt="" class="img-fluid" id="preview" /> <br>
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
                <div class=" float-right">
                    <a href="{{ route('support_details.create', $details->id) }}" class="btn btn-success">Reply</a>
                </div>
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
