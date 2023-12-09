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
                            <h3 class="card-title">Career Edit</h3>
                        </div>
                        <form method="POST" action="{{ route('careers.update', $career->id) }}" enctype="multipart/form-data">
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
                                                        <input type="text" value="{{ $career->heading }}" name="heading" class="form-control" placeholder="Heading">
                                                    </div>
                                                </div>
                                                <img src="{{ asset($career->image) }}" class="img-fluid" id="preview" width="60" height="40"/> <br>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Image</label>
                                                        
                                                        <input type="file" name="image" value="{{ $career->image }}" class="form-control"  placeholder="Image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row border rounded p-2 bg-white mt-3">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Deadline</label>
                                                    <input type="date" name="deadline" value="{{ Carbon\Carbon::parse($career->Deadline)->format('Y-m-d') }}" class="form-control"  placeholder="Deadline">
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Qualification</label>
                                                    <input type="text" name="qualification" class="form-control" placeholder="Qualification" value="{{ $career->qualification }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="border rounded p-2 bg-white mt-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Description</label>
                                                        <textarea name="description" class="form-control summernote" placeholder="Description">{!! $career->description !!}</textarea>
                                                    </div>
                                                </div>
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

@push('js')
<script>
    function viewPreview(image) {
        image.preventDefault();
        console.log(image);
        document.getElementById('preview').src = URL.createObjectURL(image.target.files[0]);
    }
</script>
@endpush