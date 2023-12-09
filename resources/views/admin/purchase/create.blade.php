<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Product Entry</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form method="POST" action="{{ route('purchase.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="row justify-content-center">
                <div class="form-group px-2">
                    <label for="exampleInputEmail1">Add Quantity</label>
                    <input type="text" class="form-control" name="quantity" placeholder="Add Quantity" required>
                </div>
                <div class="form-group mt-2">
                    <label for="exampleInputEmail1" class="d-none"></label><br>
                    <button type="submit" class="btn btn-success bg-success float-right">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
