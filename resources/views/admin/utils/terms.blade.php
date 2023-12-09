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
                            <h3 class="card-title">Add Terms & Condition</h3>
                        </div>
                        <form method="POST" action="{{ route('terms.update', $utils->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Terms & Condition</label>
                                                <textarea name="terms" class="form-control tEditor" placeholder="Terms & Condition" cols="20"
                                                    rows="22">{{ $utils->terms }}</textarea>
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