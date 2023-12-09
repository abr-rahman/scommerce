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
                            <h3 class="card-title">Add Privacy & Policy</h3>
                        </div>
                        <form method="POST" action="{{ route('privacy.update', $utils->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Privacy & Policy</label>
                                                <textarea name="privacy" class="form-control summernote" id="" placeholder="Privacy & Policy" cols="20"
                                                    rows="18">{{ $utils->privacy }}</textarea>
                                            </div>
                                        </div>
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Terms & Condition</label>
                                                <textarea name="terms" class="form-control summernote" id="" placeholder="Terms & Condition" cols="20"
                                                    rows="18">{{ $utils->terms }}</textarea>
                                            </div>
                                        </div>
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Refund Policy</label>
                                                <textarea name="refund_policy" class="form-control summernote" id="" placeholder="Refund Policy" cols="20"
                                                    rows="18">{{ $utils->refund_policy }}</textarea>
                                            </div>
                                        </div>
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Warranty Policy</label>
                                                <textarea name="warranty_policy" class="form-control summernote" id="" placeholder="Warranty Policy" cols="20"
                                                    rows="18">{{ $utils->warranty_policy }}</textarea>
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