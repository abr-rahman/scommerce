<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Create Coupon</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('coupons.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group mb-2">
                    <label for="">Coupon Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Coupon Name" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Coupon Code <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="code" placeholder="Coupon Code" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Coupon Categories </label>
                    <input type="text" class="form-control" name="categories" placeholder="Coupon Categories" >
                </div>
                <div class="form-group mb-2">
                    <label for="">Valid From <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="valid_from" placeholder="Valid From" required>
                </div>
                <div class="form-group mb-2">
                    <label for="">Valid To Date </label>
                    <input type="date" class="form-control" name="valid_to" placeholder="Valid To Date" >
                </div>
                <div class="form-group mb-2">
                    <label for="">Discount Amount Type<span class="text-danger">*</span></label>
                    <select name=""  id="mySelect" class="form-control">
                        <option>Select Discounted Type</option>
                        <option value="1" id="fixedDiscount">Discounted Amount Fixed</option>
                        <option value="2">Discounted Amount Percantage</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control d-none" id="fixed_amount" name="fixed_amount" placeholder="Fixed Amount">
                    <input type="text" class="form-control d-none" id="percent_amount" name="percent_amount" placeholder="Percen Amount %" >
                </div>
                <div class="form-group mb-2">
                    <label for="">Minimum Order Amount</label>
                    <input type="text" class="form-control" name="minimum_order" >
                </div>
                <div class="form-group mb-2">
                    <label for="">Use Limit</label>
                    <input type="text" class="form-control" name="use_limit" >
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary bg-primary">Save</button>
            </div>
        </form>
    </div>
</div>