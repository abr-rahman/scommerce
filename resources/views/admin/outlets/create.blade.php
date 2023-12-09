@extends('layouts.admin-master')

@section('section')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Outlets Create</h3>
                        </div>
                        <form method="POST" action="{{ route('outlets.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="border rounded p-2 bg-white">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Organization Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="org_name" class="form-control"
                                                            placeholder="Organization Name">
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="border rounded p-2 bg-white mt-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Phone Number <span class="text-danger">*</span></label>
                                                        <input type="phone"  name="phone"class="form-control" placeholder="Organization Phone">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="border rounded p-2 bg-white mt-3">
                                                    <div class="form-group ">
                                                        <label for="exampleInputEmail1">Email Address </label>
                                                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <label for="exampleInputEmail1">Location Link</label>
                                                        <input name="location" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="border rounded p-2 bg-white">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Address</label>
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Address">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Select District</label>
                                                <select name="district_id" class="form-control select2">
                                                    <option value="">Select District</option>
                                                    @foreach ($districts as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Select Area</label>
                                                <select name="upazila_id" class="form-control select2">
                                                    <option value="">Select Thana</option>
                                                    @foreach ($upazilas as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Social Link</label>
                                                <input type="text" name="social_link" class="form-control" placeholder="Social Link">
                                            </div>
                                        </div>
                                        <div class="float-right mt-3">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success bg-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
@push('js')
    <script>

    </script>
@endpush
