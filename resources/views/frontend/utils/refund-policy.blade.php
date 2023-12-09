@extends('frontend.layouts.master_frontend')
@section('pageTitle')
    {{ __('Refund Policy') }}
@endsection
@section('section')
<div class="font-exo font-light text-slate-700">
    <div class="relative">
        <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img" class="min-h-[220px] object-cover">
        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">
                Refund Policy</h2>
        </div>
    </div>
    <div class="mx-auto w-full xl:container px-6 py-10">
        <div class="grid gap-10">
            <h2 class="text-center text-[30px] font-semibold">Refund Policy</h2>
            <div class="">
                {!! $policy->refund_policy !!}
            </div>
        </div>
    </div>
</div>
@endsection