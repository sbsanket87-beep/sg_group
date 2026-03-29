@extends('layouts.app')

@section('title', 'Wall Cutting Services | S G Group India')

@section('extra_styles')
<style>
    /* Service Page Specific Styles */
    .text-outline {
        -webkit-text-stroke: 1px rgba(255,255,255,0.5);
    }

    /* Modal Overlay */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        inset: 0;
        background: rgba(0, 0, 0, 0.98);
        backdrop-filter: blur(15px);
        align-items: center;
        justify-content: center;
    }

    /* Carousel Wrapper */
    .carousel-wrapper {
        position: relative;
        width: 90%;
        max-width: 1100px;
        margin: auto;
        overflow: hidden;
    }

    .carousel-track {
        display: flex;
        transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        gap: 20px;
    }

    .carousel-slide {
        min-width: calc(50% - 10px); /* 2 images on desktop */
        aspect-ratio: 16/10;
        border-radius: 15px;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.1);
        background: #111;
    }

    @media (max-width: 768px) {
        .carousel-slide { min-width: 100%; } /* 1 image on mobile */
    }

    .carousel-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: #FF6B00;
        color: white;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 1100;
        transition: 0.3s;
    }
    
    .nav-btn:hover { background: #fff; color: #000; }
    .prev-btn { left: 0px; }
    .next-btn { right: 0px; }
</style>
@endsection

@section('content')
<section class="min-h-screen flex items-center pt-28 pb-12 px-6 lg:px-20 relative">
    <div class="container mx-auto grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
        
        <div class="space-y-6 lg:space-y-8 order-2 lg:order-1">
            <div class="flex items-center gap-4">
                <div class="h-[1px] w-12 bg-[#FF6B00]"></div>
                <span class="text-[#FF6B00] font-sync text-[9px] tracking-[0.4em] uppercase">Service Details</span>
            </div>
            
            <h1 class="text-4xl lg:text-7xl font-sync font-bold leading-[1.1] uppercase">
                Wall <br class="hidden lg:block"> 
                <span class="text-outline text-transparent">Cutting</span>
            </h1>
            
            <p class="text-gray-400 text-sm lg:text-lg leading-relaxed max-w-xl">
                Precision diamond wall cutting for heavy-duty industrial reinforced concrete. We deliver surgical accuracy for door openings, window expansions, and structural modifications with zero vibration.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <button onclick="openModal()" class="w-full sm:w-auto border border-white/20 hover:border-[#FF6B00] px-8 py-4 rounded-xl font-sync text-[10px] tracking-widest transition-all uppercase">
                    View Project Gallery
                </button>
                <a href="{{ url('/contact') }}" class="w-full sm:w-auto bg-white text-black text-center px-8 py-4 rounded-xl font-sync text-[10px] tracking-widest hover:bg-[#FF6B00] hover:text-white transition-all uppercase">
                    Get a Quote
                </a>
            </div>
        </div>

        <div class="relative order-1 lg:order-2 mt-4 lg:mt-0">
            <div class="rounded-3xl overflow-hidden border border-white/10 aspect-[4/3] lg:aspect-video shadow-2xl">
                <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1200" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700" alt="Wall Cutting Site">
            </div>
            <div class="absolute -bottom-4 -right-4 lg:-bottom-6 lg:-right-6 bg-[#FF6B00] p-4 lg:p-8 rounded-lg shadow-xl text-white">
                <p class="font-sync text-2xl lg:text-4xl font-bold">15+</p>
                <p class="text-[8px] lg:text-[10px] font-bold uppercase tracking-widest">Years Exp.</p>
            </div>
        </div>
    </div>
</section>

<div id="serviceModal" class="modal">
    <button onclick="closeModal()" class="absolute top-6 right-6 lg:top-10 lg:right-10 text-white text-3xl hover:text-[#FF6B00] z-[1200]">
        <i class="fa-solid fa-xmark"></i>
    </button>

    <div class="carousel-wrapper">
        <h3 class="font-sync text-center mb-8 lg:mb-12 text-[10px] lg:text-sm tracking-[0.5em] uppercase text-[#FF6B00]">Site Work Gallery</h3>
        
        <div id="track" class="carousel-track">
            <div class="carousel-slide"><img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?q=80&w=800" alt="Work 1"></div>
            <div class="carousel-slide"><img src="https://images.unsplash.com/photo-1590674899484-d5640e854abe?q=80&w=800" alt="Work 2"></div>
            <div class="carousel-slide"><img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?q=80&w=800" alt="Work 3"></div>
            <div class="carousel-slide"><img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=800" alt="Work 4"></div>
        </div>

        <div onclick="move(-1)" class="nav-btn prev-btn"><i class="fa-solid fa-chevron-left"></i></div>
        <div onclick="move(1)" class="nav-btn next-btn"><i class="fa-solid fa-chevron-right"></i></div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let currentPos = 0;
    const track = document.getElementById('track');
    const slides = document.querySelectorAll('.carousel-slide');

    function openModal() { 
        document.getElementById('serviceModal').style.display = 'flex';
        document.body.style.overflow = 'hidden'; 
    }

    function closeModal() { 
        document.getElementById('serviceModal').style.display = 'none'; 
        document.body.style.overflow = 'auto';
    }

    function move(direction) {
        const gap = 20;
        const isMobile = window.innerWidth <= 768;
        const visibleSlides = isMobile ? 1 : 2;
        const maxPos = slides.length - visibleSlides;
        
        currentPos += direction;

        if (currentPos < 0) currentPos = 0;
        if (currentPos > maxPos) currentPos = maxPos;

        const slideWidth = slides[0].offsetWidth;
        const moveX = currentPos * (slideWidth + gap);
        track.style.transform = `translateX(-${moveX}px)`;
    }

    window.onclick = function(e) {
        if (e.target.id === 'serviceModal') closeModal();
    }

    window.addEventListener('resize', () => {
        currentPos = 0;
        track.style.transform = `translateX(0px)`;
    });
</script>
@endsection