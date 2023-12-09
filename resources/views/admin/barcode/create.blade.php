@extends('layouts.admin-master')
@section('section')
        <div class="card">
            <div class="card-header">
                {{ __('Create QR Code') }} <br>
                <strong>{{ $product->product_name }}</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('product.store.qr_code') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_name" value="{{ $product->product_name }}">
                    <div class="form-group mb-2">
                        <label for="">Add Quantity</label>
                        <input type="number" class="form-control" name="quantity" placeholder="Quantity" required>
                    </div>
                    <button type="submit" class="btn btn-primary bg-primary">Save</button>
                </form>
            </div>
            
            <div class="flex flex-wrap gap-1 p-3">
                @foreach ($qrcodes as $code)
                    <div>
                        {{ QrCode::margin(3)->size(80)->generate($baseUrl.$code->barcode_number) }}
                        <p class="ml-2">{{ $code->serial_number }}</p>
                    </div>
                @endforeach
            </div>
        </div>
@endsection
