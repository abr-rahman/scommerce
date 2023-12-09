@extends('frontend.layouts.master_frontend')
@section('pageTitle')
    {{ __('News') }}
@endsection
@section('section')
    <div class="relative">
        <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img" class="min-h-[220px] object-cover">
        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">
                All News</h2>
        </div>
    </div>
    <div class="mx-auto w-full xl:container px-6 py-10">
        <div class="grid gap-16">
            @foreach ($newses as $news)
                <div class="grid md:flex items-start gap-5 lg:gap-10">
                    @if ($loop->odd)
                        <a href="{{ route('forntend.news.details', $news->id) }}" class="w-full md:w-[400px] ">
                            <img src="{{ asset('uploads/news/' . $news->image) }}" alt="img"
                                class="w-full object-cover">
                        </a>
                    @endif
                    <div class="grid flex-1 gap-5">
                        <div class="grid gap-2">
                            <a href="{{ route('forntend.news.details', $news->id) }}">
                                <h2 class="text-2xl cursor-pointer hover:text-fave-500 font-semibold line-clamp-3">
                                    {{ $news->heading }}</h2>
                            </a>
                            <div class="text-fave-500 flex items-center gap-2">
                                <span><svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-calendar-due" width="20" height="20"
                                        viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                        </path>
                                        <path d="M16 3v4"></path>
                                        <path d="M8 3v4"></path>
                                        <path d="M4 11h16"></path>
                                        <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                    </svg></span>
                                <span>{{ $news->created_at->format('d-M-Y') }} </span>
                            </div>
                        </div>
                        <div class="">
                            <p class="text-justify">{!! Str::limit(strip_tags($news->description), 350, '...') !!} <a href="{{ route('forntend.news.details', $news->id) }}" class="text-fave-500 hover:text-fave-700">See more</a></p>
                        </div>
                    </div>
                    @if ($loop->even)
                        <a href="{{ route('forntend.news.details', $news->id) }}" class="w-full md:w-[400px]">
                            <img src="{{ asset('uploads/news/' . $news->image) }}" alt="img"
                                class="w-full md:max-h-[300px] object-cover">
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
