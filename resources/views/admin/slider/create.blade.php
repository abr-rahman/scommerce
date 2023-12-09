<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Create Slider</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group mb-2">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Heading</label>
                    <input type="text" class="form-control" name="heading" placeholder="Heading" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="paragraph" placeholder="Paragraph" >
                </div>
                <div class="form-group mb-2">
                    <label for="">Url</label>
                    <input type="text" class="form-control" name="url" placeholder="URL" >
                </div>
                <div class="form-group mb-2">
                    <label for="">Button Type</label>
                    <Select name="button_type" class="form-control">
                        <option value="1">Shop Now</option>
                        <option value="2">Coming Soon</option>
                    </Select>
                </div>
                <div class="form-group mb-2">
                    <label for="">Numbering</label>
                    <input type="number" class="form-control" name="numbering" placeholder="1" >
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary bg-primary">Save</button>
            </div>
        </form>
    </div>
</div>