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
                            <h3 class="card-title">News Edit</h3>
                        </div>
                        <form method="POST" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="border rounded p-2 bg-white">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Heading <span class="text-danger">*</span></label>
                                                        <input type="text" value="{{ $news->heading }}" name="heading" class="form-control" placeholder="Heading">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Image</label>
                                                        <input type="file" name="image" class="form-control"  placeholder="Image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description</label>
                                                <textarea name="description" class="form-control tEditor" placeholder="Description" cols="20"
                                                    rows="18">{!! $news->description !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="float-right mt-2">
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

