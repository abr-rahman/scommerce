<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Brand</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                @method('PATCH')
                <div class="form-group mb-2">
                    <label for="">Image</label>
                    <input type="file" class="form-control" value="{{ $slider->image }}" name="image">
                </div>
                <div class="form-group mb-2">
                    <label for="">Heading</label>
                    <input type="text" class="form-control" value="{{ $slider->heading }}" name="heading" placeholder="Heading" >
                </div>
                <div class="form-group mb-2">
                    <label for="">Description</label>
                    <input type="text" class="form-control" value="{{ $slider->paragraph }}" name="paragraph" placeholder="Paragraph" >
                </div>
                <div class="form-group mb-2">
                    <label for="">Url</label>
                    <input type="text" class="form-control" value="{{ $slider->url }}" name="url" placeholder="URL" >
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
                    <input type="number" class="form-control" value="{{ $slider->numbering }}" name="numbering" placeholder="1" >
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary bg-primary">Save</button>
            </div>
        </form>
    </div>
</div>