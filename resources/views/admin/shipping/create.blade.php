@extends('layouts.admin-master')
@push('css')
    <style>
        .border {
            border: 1px solid #b3b3b3 !important;
        }
    </style>
@endpush
@section('section')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Shipping Create</h3>
                        </div>
                        <form action="{{ route('shippings.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                @csrf
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
            </div>
        </div>
</section>
@endsection