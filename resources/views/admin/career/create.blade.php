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
                            <h3 class="card-title">Career Create</h3>
                        </div>
                        <form method="POST" action="{{ route('careers.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="border rounded p-2 bg-white">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Heading <span class="text-danger">*</span></label>
                                                <input type="text" name="heading" class="form-control" placeholder="Heading">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Image <span class="text-danger">*</span></label>
                                                <input type="file" name="image" class="form-control"  placeholder="Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row border rounded p-2 bg-white mt-3">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Deadline</label>
                                            <input type="date" name="deadline" class="form-control"  placeholder="Deadline">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Qualification</label>
                                            <input type="text" name="qualification" class="form-control" placeholder="Qualification" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description</label>
                                                <textarea name="description" class="form-control summernote" cols="10" rows="20" placeholder="Description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 float-right ">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success bg-success">Submit</button>
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

