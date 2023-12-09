@extends('layouts.admin-master')
@push('css')
    <style>
        .border {
            border: 1px solid #b3b3b3 !important;
        }
    </style>
@endpush
@section('section')
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Shipping</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('shippings.update', $shipping->id) }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                @method('PATCH')
                <div class="form-group mb-2">
                    <label for="">Select Division</label>
                    <select name="division_id" id="divisionSelect"  class="form-control" required>
                        <option value="">Select Division</option>
                        @foreach ($divisions as $division)
                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="">Select District</label>
                    <select name="district_id" id="district_dropdown"  class="form-control" required>
                        <option value="">Select District</option>
                    </select>
                </div>
                {{-- <div class="form-group mb-2">
                    <label for="">Select Upazila</label>
                    <select name="upazila_id" id="upazila_dropdown"  class="form-control" >
                        <option value="">Select Upazila</option>
                    </select>
                </div> --}}
                <div class="form-group mb-2">
                    <label for="">Shipping Charge</label>
                    <input type="text" class="form-control" name="charge" placeholder="Shipping Charge" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary bg-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection