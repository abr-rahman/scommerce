@extends('frontend.layouts.master_frontend')
@section('pageTitle'){{ __('Career') }}@endsection
@section('section')
<div class="relative">
    <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img" class="min-h-[220px] object-cover">
    <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
        <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">Careers</h2>
    </div>
</div>
<div class="mx-auto w-full xl:container sm:px-6 py-10">
    <div class="">
        @if ($careers)
        <h6 class="text-center text-green-600">OPEN POSITIONS</h6>
        <h2 class="text-2xl text-center">Diversified Job Openings To Apply</h2>
        @endif
        @forelse ($careers as $career)
            <div class="mt-3 border p-5 rounded-md shadow grid gap-5">
                <div class="flex flex-col-reverse sm:flex-row items-center gap-2 bg-slate-100 p-2 rounded-md">
                    <a href="{{ route('frontend.career.apply', $career->id) }}">
                        <button class="bg-fave-500 text-white py-2 px-5 rounded-md font-semibold text-xl">Apply</button>
                    </a>
                    <p class="text-xl text-center sm:text-left">{{ $career->heading }}</p>
                </div>
                <div class="grid gap-2">
                    <div class="grid lg:grid-cols-2 items-start gap-5 md:gap-10">
                        <img src="{{ asset('uploads/career/'. $career->image ) }}" alt="img" class="w-full max-h-[500px] object-contain">
                        <div class="">
                            <h2 class="text-fave-500 text-xl pb-3">Job Description</h2>
                            <p class="text-justify">{!! $career->description !!}</p>
                        </div>
                    </div>
                    <div class="grid gap-5">
                        <div class="">
                            <h2 class="text-fave-500 text-xl">Deadline</h2>
                            <p class="">{{ \Carbon\Carbon::parse($career->deadline)->format('d-m-Y') }}</p>
                        </div>
                        <div class="">
                            <h2 class="text-fave-500 text-xl">Qualifications</h2>
                            <p class="text-justify">{!! $career->qualification !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h2 class="text-2xl text-center py-10 bg-slate-600">Job circular not avaiable</h2>
        @endforelse
    </div>
</div>
@endsection
