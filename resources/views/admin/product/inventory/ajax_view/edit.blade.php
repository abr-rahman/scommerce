<div class="card-header">
    <h3 class="card-title">Edit Product Inventory </h3>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <div class="border rounded p-2">
                <form method="POST" action="{{ route('inventory.update', $inventory->id) }}" enctype="multipart/form-data" id="edit_inventory_form">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $inventory->product_id }}">
                    <div class="row">
                        {{-- <div class="col-md-4">
                            <label for="exampleInputEmail1">Select Your Size</label>
                            <div class="form-group">
                                <select name="size_id" id="" class="form-control">
                                    <option value="">Select Your Size</option>
                                    @foreach ($sizes as $item)
                                        <option value="{{ $item->id }}" @selected($item->id == $inventory->size_id)><b>{{ $item->size }}</b></option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Select Color</label>
                            <select name="color_id" id="" class="form-control">
                                <option value="">Select Your Color</option>
                                @foreach ($colors as $item)
                                    <option value="{{ $item->id }}" @selected($item->id == $inventory->color_id) style="color: {{ $item->color_code }}"><b>{{ $item->color_name }}</b></option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label for="exampleInputEmail1">Add Quantity</label>
                                <input type="text" class="form-control" name="quantity" value="{{ $inventory->quantity }}"
                                    placeholder="Add Quantity" required>
                            </div>
                        </div>
                        <div class="col-md-1 mt-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="d-none"></label><br>
                                <button type="submit"
                                    class="btn btn-success bg-success float-right">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
