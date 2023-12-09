@extends('layouts.admin-master')
@push('css')
    <style>
        .saleEntryBorder {
            border-bottom: 1px solid #bebebe;
        }
    </style>
@endpush
@section('section')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-transparent border-none shadow-none">
                        <div class="mb-3 py-3 saleEntryBorder">
                            <h3 class="card-title text-[20px] font-semibold">Offline Sale Entry</h3>
                        </div>
                        <div class="">
                            <div class="w-full mb-3">
                                <div class="border rounded p-2 bg-white">
                                    <form action="{{ route('offline.sale_add_cart') }}" method="post" id="saleItemEntry">
                                        @csrf
                                        <input type="hidden" value="{{ $customer->id }}" name="customer_id" id="">
                                        <div class="grid grid-cols-4 gap-10">
                                            <div class="col-span-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Product </label>
                                                    <select name="product_id" id="productId" class="form-control select2">
                                                        <option>Select Product</option>
                                                        @foreach ($products as $item)
                                                            <option value="{{ $item->id }}">{{ $item->product_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-span-2 gap-5" style="display: flex;">
                                                <div class="flex-1">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Price </label>
                                                        <input type="number" name="price" id="entryPrice"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" class="flex justify-between pb-0">
                                                            <span> Quantity | </span>
                                                            <div class="">
                                                                <span for="exampleInputEmail1" class="text-info">Current
                                                                    Stock:</span>
                                                                <span id="showQuantity"
                                                                    class="border-rounded text-center text-info font-weight-bold">
                                                                </span>
                                                            </div>
                                                        </label>
                                                        <input type="number" name="quantity" id="quantity"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="float-right">
                                                    <div class="grid">
                                                        <label class="font-medium opacity-0">1</label>
                                                        <button type="submit" class="bg-success p-2 rounded"
                                                            style="width: 150px;">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div style="display: grid;  grid-template-columns: 3fr 1fr; grid-gap: 20px" class="">
                                <div class="bg-white rounded p-2">
                                    <table class="table-auto w-full">
                                        <thead class="w-full">
                                            <tr style="background: #c2c2c2">
                                                <th class="border p-2 text-center">Product Name</th>
                                                <th class="border p-2 text-center">Per: Price</th>
                                                <th class="border p-2 text-center">Quantity</th>
                                                <th class="border p-2 text-center">Total</th>
                                                <th class="border p-2 text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $grand_total = 0;
                                            @endphp
                                            @foreach ($cart as $item)
                                                @php
                                                    $grand_total += $item->price * $item->quantity;
                                                @endphp
                                            <tr>
                                                <td class="border p-2">{{ $item->product->product_name }}</td>
                                                <td class="border p-2 text-end">{{ $item->price }}</td>
                                                <td class="border p-2 text-center">{{ $item->quantity }}</td>
                                                <td class="border p-2 text-end">{{ $item->quantity * $item->price }}</td>
                                                <td class="border p-2 text-center"><a class="btn btn-sm btn-danger delete_more_for_add"
                                                    href="{{ route('offline.sale.remove_enty', $item->id) }}">×</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="bg-white rounded p-3">
                                    <div class="grid gap-2">
                                        <form action="{{ route('offline.sale_store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                            <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #727272;">
                                                <div class="font-semibold">Sub-Total:</div>
                                                <input name="sub_total" class="font-semibold text-right border-none outline-none" readonly value="{{ $totalPrice }}" />
                                            </div>
                                            <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #727272;">
                                                <div class="font-semibold">Quantity:</div>
                                                <input class="font-semibold text-right border-none outline-none" readonly value="{{ $totalQuantity }}" />
                                            </div>
                                            <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #727272;">
                                                <div class="font-semibold">Grand Total:</div>
                                                <input name="grand_total" class="font-semibold text-right border-none outline-none" readonly value="{{ $grand_total }}" />
                                            </div>
                                            <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #727272;">
                                                <div class="font-semibold">Paid:</div>
                                                <input name="payable_amount" class="font-semibold text-right border-none outline-none" value="00" />
                                            </div>
                                            <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #727272;">
                                                <div class="font-semibold">Due:</div>
                                                <input name="due_amount" class="font-semibold text-right border-none outline-none" value="{{ $grand_total }}" />
                                            </div>
                                            <button type="submit" class="btn btn-info float-right bg-success mt-2">submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $('body').on('change', '#productId', function(e) {
            var product_id = $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{ route('offline.sale.select_customer') }}",
                data: {
                    product_id: product_id
                },
                success: function(data) {
                    $('#showQuantity').html(data.inventory);
                }
            });
        });
    </script>
@endpush
