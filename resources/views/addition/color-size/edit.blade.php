@extends('layouts.admin-master')
@section('section')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Create Color & Size</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if ($item->size_name != null)
                                    <div class="col-md-12">
                                        <div class="border rounded p-2">
                                            <form method="POST" action="{{ route('additions.update', $item->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Size Name <span  class="text-danger">*</span></label>
                                                            <input type="text" name="size_name" class="form-control" value="{{ $item->size_name }}"
                                                                placeholder="Enter your size Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Size <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="size" class="form-control" value="{{ $item->size }}"
                                                                placeholder="Expected your size">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mt-2">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1" class="d-none"></label><br>
                                                            <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <div class="border rounded p-2">
                                            <form method="POST" action="{{ route('additions.update', $item->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Color Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="color_name" class="form-control"  value="{{ $item->color_name }}"
                                                                placeholder="Enter your color Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Color Code <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="color" name="color_code" class="form-control" value="{{ $item->color_code }}"
                                                                placeholder="Expected your color">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mt-2">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1" class="d-none"></label><br>
                                                            <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
