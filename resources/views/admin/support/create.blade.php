@extends('layouts.admin-master')
@section('section')
        <div class="card">
            <div class="card-header">
                {{ __('Support') }}                    
            </div>
            <div class="card-body">
                <form action="{{ route('reply-supports.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $support_id->id }}" name="support_id">
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="">Subject <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Attachment </label>
                            <input type="file" class="form-control" name="attachment" placeholder="Attachment" >
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control tEditor" id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="modal-footer justify-content-between float-right">
                            <button type="submit" class="btn btn-primary bg-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection