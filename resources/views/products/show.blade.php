@extends('layouts.app')

@section('title', $product->name . ' | S G Group India')

@section('extra_styles')
<style>
    .modal { display: none; position: fixed; inset:0; background: rgba(0,0,0,0.95); backdrop-filter: blur(15px); align-items: center; justify-content: center; padding: 2rem; z-index:1000; }
    .modal-content { width:90%; max-width:900px; height:80%; background:#fff; border-radius:15px; overflow:hidden; position:relative; }
    .modal-content iframe { width:100%; height:100%; border:none; }
    .close-btn { position:absolute; top:1rem; right:1rem; font-size:2rem; color:#ff6b00; cursor:pointer; z-index:1100; }
    .service-section { min-height:100vh; padding-top:7rem; padding-bottom:3rem; }
    .font-sync { font-family:'Syncopate', sans-serif; }
    .text-gray-400 { color:#9ca3af; }
    @keyframes zoomIn {
    from {
        transform: scale(0.8);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

.animate-zoom {
    animation: zoomIn 0.4s ease;
}
</style>
@endsection

@section('content')
<section class="service-section flex items-center px-6 lg:px-20 relative">
    <div class="container mx-auto grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

        <!-- Product Info -->
        <div class="space-y-6 lg:space-y-8 order-2 lg:order-1">
            <div class="flex items-center gap-4">
                <div class="h-[1px] w-12 bg-[#FF6B00]"></div>
                <span class="text-[#FF6B00] font-sync text-[9px] tracking-[0.4em] uppercase">Product Details</span>
            </div>

            <h1 class="text-4xl lg:text-7xl font-sync font-bold leading-[1.1] uppercase">
                {{ $product->name }}
            </h1>

            <p class="text-gray-400 text-sm lg:text-lg leading-relaxed max-w-xl">
                {{ $product->description }}
            </p>

            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <button onclick="openModal()" class="w-full sm:w-auto border border-white/20 hover:border-[#FF6B00] px-8 py-4 rounded-xl font-sync text-[10px] tracking-widest transition-all uppercase">
                    View Product PDF
                </button>

                <a href="{{ url('/contact') }}" class="w-full sm:w-auto bg-white text-black text-center px-8 py-4 rounded-xl font-sync text-[10px] tracking-widest hover:bg-[#FF6B00] hover:text-white transition-all uppercase">
                    Get a Quote
                </a>
            </div>
        </div>

        <!-- Product Image -->
        <div class="relative order-1 lg:order-2 mt-4 lg:mt-0">
    <div onclick="openImageModal()" class="cursor-zoom-in rounded-3xl overflow-hidden border border-white/10 shadow-2xl bg-black/20 p-4 group">
        
        <img src="{{ asset('storage/'.$product->image) }}"
             class="w-full max-h-[500px] object-contain mx-auto transition duration-500 group-hover:scale-105"
             alt="{{ $product->name }}">

    </div>
</div>

    </div>
</section>

<!-- PDF Modal -->
<div id="productModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        @if($product->pdf)
            <iframe src="{{ asset('storage/'.$product->pdf) }}" title="{{ $product->name }}"></iframe>
        @else
            <p class="p-6 text-center text-gray-700 text-lg font-bold">No PDF available for this product.</p>
        @endif
    </div>
</div>
<!-- Image Viewer Modal -->
<div id="imageModal" class="modal">
    <span class="close-btn" onclick="closeImageModal()">&times;</span>

    <img id="fullImage"
         src="{{ asset('storage/'.$product->image) }}"
         class="max-w-[90%] max-h-[90%] object-contain rounded-xl shadow-2xl animate-zoom">
</div>
@endsection

@section('scripts')
<script>
    function openModal() {
        const modal = document.getElementById('productModal');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('productModal');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    window.onclick = function(e) {
        const modal = document.getElementById('productModal');
        if (e.target === modal) closeModal();
    }

    function openImageModal() {
    const modal = document.getElementById('imageModal');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close on outside click
window.addEventListener('click', function(e) {
    const modal = document.getElementById('imageModal');
    if (e.target === modal) closeImageModal();
});

// Close on ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === "Escape") closeImageModal();
});
</script>
@endsection