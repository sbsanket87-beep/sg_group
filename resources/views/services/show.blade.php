@extends('layouts.app')

@section('title', $service->name . ' | S G Group India')

@section('extra_styles')
<style>
.service-section {
    min-height: 100vh;
    padding-top: 7rem;
    padding-bottom: 3rem;
}

.font-sync { font-family:'Syncopate', sans-serif; }

.gallery-img {
    transition: 0.4s;
}
.gallery-img:hover {
    transform: scale(1.05);
}
</style>
@endsection

@section('content')

<!-- MAIN SECTION -->
<section class="service-section px-6 lg:px-20">
    <div class="container mx-auto grid lg:grid-cols-2 gap-12 items-center">

        <!-- LEFT CONTENT -->
        <div class="space-y-6">

            <div class="flex items-center gap-4">
                <div class="h-[1px] w-12 bg-[#FF6B00]"></div>
                <span class="text-[#FF6B00] font-sync text-[9px] tracking-[0.4em] uppercase">
                    Service Details
                </span>
            </div>

            <h1 class="text-4xl lg:text-6xl font-sync font-bold uppercase">
                {{ $service->name }}
            </h1>

            <div class="text-gray-400 text-sm lg:text-lg leading-relaxed max-w-xl space-y-4">
    {!! $service->description !!}
</div>

            <!-- CONTACT BUTTON -->
            <a href="{{ url('/contact') }}"
               class="inline-block bg-white text-black px-8 py-4 rounded-xl font-sync text-[10px] tracking-widest hover:bg-[#FF6B00] hover:text-white transition uppercase">
                Contact Us
            </a>

        </div>

        <!-- MAIN IMAGE -->
        <div class="rounded-3xl overflow-hidden border border-white/10 p-4 bg-black/20">
            <img src="{{ asset('storage/'.$service->image) }}"
                 class="w-full max-h-[500px] object-contain mx-auto">
        </div>

    </div>
</section>

<!-- GALLERY SECTION -->
@if($service->images->count())
<section class="px-6 lg:px-20 pb-20">
    <div class="container mx-auto">

        <h2 class="font-sync text-2xl mb-10 uppercase">
            Service <span class="text-[#FF6B00]">Gallery</span>
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach($service->images as $img)
            <div class="rounded-2xl overflow-hidden border border-white/10">
                <img src="{{ asset('storage/'.$img->image) }}"
                     class="w-full h-56 object-cover gallery-img">
            </div>
            @endforeach

        </div>

    </div>
</section>
@endif

@endsection