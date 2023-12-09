@if (!empty($verifyProduct))
    <div class="bg-gray-300 p-5 font-medium border-t-8 border-white">
        <p>Name: <strong> {{ $verifyProduct->first()->name }}</strong></p>
        <p>Contact No: <strong >{{ $verifyProduct->first()->phone }}</strong></p>
    </div>

    <div class="bg-fave-500 py-3 px-5">
        <p class="text-white font-medium">Products you have bought</p>
    </div>
    <div class="border-8 border-gray-200">
        @foreach ($verifyProduct as $item)
            <div class="bg-white grid md:grid-cols-6 grid-cols-5 border-b  py-1 items-center hover:bg-gray-200">
                <div class="col-span-1 ">
                    <span class="text-white sm:ml-5 ml-2 sm:text-xl px-4 py-2 text-left text-xs sm:text-base font-medium bg-fave-500 rounded-md uppercase tracking-wider">
                        {{ $loop->iteration }}
                    </span>
                </div>
                <div class="md:col-span-5 col-span-4 px-5 md:px-0 py-1 md:py-1 sm:grid md:grid-cols-5 items-center">
                    <div class="md:col-span-2 ">
                        <p scope="col" class="text-left text-xs sm:text-base font-bold tracking-wider">
                            Product ID <br>
                            <span class=" py-4 font-normal break-all">
                                {{ $item->product->product_code }}
                            </span>
                        </p>
                    </div>
                    <div class="md:col-span-2 md:mx-auto my-1 md:my-0">
                        <p scope="col" class="text-left text-xs sm:text-base font-bold tracking-wider">
                            Bought On <br>
                            <span class=" py-4 font-normal ">
                                {{ $item->created_at->format('Y-m-d'); }}
                            </span>
                        </p>
                    </div>
                    @php
                        $createdDate = $item->created_at;                        
                        $futureDate = $createdDate->addDays($item->product->warranty_day);
                        $warrantyFinal = $futureDate->format('Y-m-d H:i:s');
                    @endphp
                    @if ($item->status == App\Enums\StatusEnum::Active->value)
                        @if ($warrantyFinal >= Carbon\Carbon::now())
                            <div class="md:col-span-1">
                            <a href="{{ route('claim.warranty', $item->id) }}"> 
                                <button class="bg-fave-900 hover:bg-fave-700 text-white p-2 rounded mr-2 text-xs md:text-md uppercase btn">Claim</button></a>
                            </div>
                        @else
                        <div class="md:col-span-1">
                            <button class="bg-fave-900 hover:bg-fave-700 text-white p-2 rounded mr-2 text-xs md:text-md uppercase">Warranty has expired</button>
                        </div>
                        @endif
                    @else
                        <div class="md:col-span-1">
                            <button class="bg-fave-900 hover:bg-fave-700 text-white p-2 rounded mr-2 text-xs md:text-md uppercase">Rejected</button>
                        </div>
                    @endif
                </div>
            </div>
         @endforeach
    </div>
@else
    <div class="bg-red-500 py-3 px-5">
        <p class="text-white font-medium text-center">
            Your Number Not Found
        </p>
    </div>
@endif
