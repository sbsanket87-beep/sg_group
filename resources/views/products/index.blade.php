@extends('layouts.app')

@section('title', 'All Products | S G Group India')

@section('content')
<section class="min-h-screen pt-28 pb-16 px-6 lg:px-20 bg-black text-white">
    
    <!-- Header -->
    <div class="container mx-auto mb-12 lg:mb-16">
        <div class="flex flex-col lg:flex-row justify-between items-end gap-6">
            <div>
                <h1 class="font-sync text-4xl lg:text-6xl uppercase leading-tight">
                    Our <span class="text-[#FF6B00]">Products</span>
                </h1>
                <p class="text-gray-400 text-[10px] tracking-[0.3em] uppercase mt-2">
                    Explore our complete range
                </p>
            </div>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="container mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-8">

        @foreach($products as $product)
        <div class="group flex flex-col rounded-2xl overflow-hidden border border-white/10 bg-white/5 hover:border-[#FF6B00] transition-all duration-500">

            <!-- Image -->
            <div class="aspect-[4/3] overflow-hidden">
                <img src="{{ asset('storage/'.$product->image) }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
            </div>

            <!-- Content -->
            <div class="p-6 flex flex-col flex-grow">

                <div>
                    <h3 class="text-xl lg:text-2xl font-bold mb-3 text-white">
                        {{ $product->name }}
                    </h3>

                    <p class="text-gray-400 text-sm mb-4">
                        {{ \Illuminate\Support\Str::limit($product->description, 100) }}
                    </p>
                </div>

                <!-- Button FIXED at bottom -->
                <div class="mt-auto">
                    <a href="{{ route('product.show', $product->id) }}"
                    class="inline-block w-full text-center bg-white text-black px-6 py-3 rounded-xl text-[10px] font-bold uppercase tracking-widest hover:bg-[#FF6B00] hover:text-white transition">
                    View Product
                    </a>
                </div>

            </div>

        </div>
        @endforeach

    </div>

    <!-- Pagination -->
    <div class="container mx-auto mt-12">
        <div class="flex justify-center">
            {{ $products->links() }}
        </div>
    </div>

</section>
@endsection