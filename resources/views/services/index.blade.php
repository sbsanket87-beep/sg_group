@extends('layouts.app')

@section('title', 'All Services | S G Group India')

@section('content')
<section class="min-h-screen pt-28 pb-16 px-6 lg:px-20 bg-[#020202] text-white">
    
    <!-- HEADER -->
    <div class="container mx-auto mb-12 lg:mb-16">
        <div class="flex flex-col lg:flex-row justify-between items-end gap-6">
            <div>
                <h1 class="font-sync text-4xl lg:text-6xl uppercase leading-tight">
                    Our <span class="text-[#FF6B00]">Services</span>
                </h1>
                <p class="text-gray-500 text-[10px] tracking-[0.3em] uppercase mt-2">
                    What we offer to our clients
                </p>
            </div>
        </div>
    </div>

    <!-- SERVICES GRID -->
    <div class="container mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach($services as $service)
        <div class="group rounded-3xl overflow-hidden border border-white/10 bg-white/[0.02] hover:border-[#FF6B00] transition duration-500">

            <!-- IMAGE -->
            <div class="relative h-64 overflow-hidden">
                <img src="{{ asset('storage/'.$service->image) }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition duration-700">

                <!-- subtle overlay -->
                <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition"></div>
            </div>

            <!-- CONTENT -->
            <div class="p-6 flex flex-col">

                <h3 class="text-xl font-semibold mb-3">
                    {{ $service->name }}
                </h3>

                <p class="text-gray-400 text-sm mb-6">
                {{ Str::limit(strip_tags($service->description), 120) }}
                </p>

                <!-- BUTTON -->
                <a href="{{ route('services.show', $service->id) }}"
                   class="mt-auto inline-block text-center border border-white/20 px-6 py-3 rounded-xl text-[10px] uppercase tracking-widest hover:border-[#FF6B00] hover:text-[#FF6B00] transition">
                   Learn More
                </a>

            </div>

        </div>
        @endforeach

    </div>

    <!-- PAGINATION -->
    <div class="container mx-auto mt-12">
        <div class="flex justify-center">
            {{ $services->links() }}
        </div>
    </div>

</section>
@endsection