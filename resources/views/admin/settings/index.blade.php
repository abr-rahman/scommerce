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
                            <h3 class="card-title">General Settings</h3>
                        </div>
                        <form method="POST" action="{{ route('settings.update', $settings->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="border rounded p-2 bg-white">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Business Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="business_name" value="{{ $settings->business_name }}" class="form-control"
                                                            placeholder="Business Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Business Logo </label>
                                                        <label>Upload new one to replace:</label>
                                                        <input type="file" value="{{ $settings->logo }}" name="logo" class="form-control" placeholder="Business Name">
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <img src="{{ asset('uploads/logo/'. $settings->logo) }}" alt="{{ $settings->business_name }}" class="img-fluid" id="preview" width="100"/> <br>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">                 
                                                <div class="border rounded p-2 bg-white mt-3">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Business Email <span class="text-danger">*</span></label>
                                                        <input type="email" value="{{ $settings->email }}" name="email" class="form-control" placeholder="Business Email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="border rounded p-2 bg-white mt-3">
                                                    <div class="form-group ">
                                                        <label for="exampleInputEmail1">Support Email <span class="text-danger">*</span></label>
                                                        <input type="email" value="{{ $settings->support_email }}" name="support_email" class="form-control" placeholder="Support Email">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border rounded p-2 bg-white mt-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">First Address</label>
                                                        <input type="text" value="{{ $settings->address_one }}" name="address_one" class="form-control"   placeholder="First Address">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Second Address</label>
                                                        <input type="text" value="{{ $settings->address_two }}" name="address_two" class="form-control"   placeholder="Second Address">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">First Phone Number</label>
                                                        <input type="text" value="{{ $settings->phone_one }}" name="phone_one" class="form-control"
                                                            placeholder="First Phone Number">
                                                    </div>
                                                </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Second Phone Number</label>
                                                            <input type="text" value="{{ $settings->phone_two }}" name="phone_two" class="form-control"
                                                                placeholder="Second Phone Number">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">                              
                                        <div class="border rounded p-2 bg-white">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Facebook Link</label>
                                                <input type="text" value="{{ $settings->fb_link }}" name="fb_link" class="form-control" placeholder="Facebook Link">
                                            </div>
                                            <div class="form-group ">
                                                <label for="exampleInputEmail1">Twitter Link </label>
                                                <input type="text" value="{{ $settings->tw_link }}" name="tw_link" class="form-control" placeholder="Twitter Link">
                                            </div>
                                            <div class="form-group ">
                                                <label for="exampleInputEmail1">Youtube Link </label>
                                                <input type="text" value="{{ $settings->youtube_link }}" name="youtube_link" class="form-control" placeholder="Youtube Link">
                                            </div>
                                            <div class="form-group ">
                                                <label for="exampleInputEmail1">Linkedin Link </label>
                                                <input type="text" value="{{ $settings->linkedin_link }}" name="linkedin_link" class="form-control" placeholder="Linkedin Link">
                                            </div>
                                            <div class="form-group ">
                                                <label for="exampleInputEmail1">Instagram Link </label>
                                                <input type="text" value="{{ $settings->insta_link }}" name="insta_link" class="form-control" placeholder="Instagram Link">
                                            </div>
                                            <div class="form-group ">
                                                <label for="exampleInputEmail1">Tiktok Link </label>
                                                <input type="text" value="{{ $settings->tiktok_link }}" name="tiktok_link" class="form-control" placeholder="Tiktok Link">
                                            </div>
                                            <div class="form-group ">
                                                <label for="exampleInputEmail1">Location Link </label>
                                                <input name="location_link" class="form-control" value="{{ $settings->location_link }}" />
                                            </div>
                                            {{-- <div class="form-group ">
                                                <label for="exampleInputEmail1">Location Link </label>
                                                <textarea name="location_link" class="form-control tEditor"cols="30" rows="10">{!! $settings->location_link !!}</textarea>
                                            </div> --}}
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
        function viewPreview(image) {
            image.preventDefault();
            console.log(image);
            document.getElementById('preview').src = URL.createObjectURL(image.target.files[0]);
        }
    </script>
@endpush