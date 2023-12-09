<div class="modal-dialog modal-lg">
    <div class="modal-content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Shipping Create</h3>
                </div>
                <form action="{{ route('custom-shippings.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="">Shipping Area Name</label>
                            <input type="text" class="form-control" name="area_name" placeholder="Shipping Area Name">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Shipping Charge</label>
                            <input type="number" class="form-control" name="charge" placeholder="Shipping Charge Amount" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary bg-primary">Save</button>
                    </div>
                </form>
            </div>
    </div>
</div>
