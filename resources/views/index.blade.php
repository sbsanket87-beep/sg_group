<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S G Group India | Industrial Excellence & Global Logistics</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Syncopate:wght@700&family=Outfit:wght@300;400;600;800&family=Space+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --orange-main: #FF6B00;
            --orange-hover: #E65F00;
            --slate-white: #F8F9FA;
            --deep-slate: #1A1C1E;
        }
        
        body { 
            font-family: 'Outfit', sans-serif; 
            background-color: var(--slate-white); 
            color: var(--deep-slate);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        .font-sync { font-family: 'Syncopate', sans-serif; }
        .font-mono { font-family: 'Space Mono', monospace; }

        .hero-panel { 
            position: relative; 
            width: 100%;
            height: 50vh; 
            overflow: hidden; 
            transition: all 1.2s cubic-bezier(0.16, 1, 0.3, 1);
        }
        @media (min-width: 1024px) {
            .hero-panel { height: 100vh; flex: 1; }
            .hero-panel:hover { flex: 1.8; }
        }
        
        .hero-img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform 2s cubic-bezier(0.16, 1, 0.3, 1);
            transform: scale(1.1);
        }
        .hero-panel:hover .hero-img { transform: scale(1.05); }

        .nav-transparent { color: white; background: transparent; }
        .nav-scrolled { color: var(--deep-slate); background: rgba(255,255,255,0.95); box-shadow: 0 4px 30px rgba(0,0,0,0.1); backdrop-filter: blur(10px); }
        
        #mobile-menu {
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
            transform: translateY(-100%);
        }
        #mobile-menu.active { transform: translateY(0); }

        /* --- NEW SERVICES SECTION STYLES --- */
        .service-card-modern {
            position: relative;
            height: 450px;
            border-radius: 2rem;
            overflow: hidden;
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .service-card-modern .service-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 60%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 40px;
            transition: all 0.5s ease;
        }
        .service-card-modern:hover { transform: translateY(-10px); }
        .service-card-modern:hover .service-overlay { background: linear-gradient(to top, rgba(255,107,0,0.85) 0%, rgba(0,0,0,0.2) 100%); }

        .service-card {
            background: white;
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            border: 1px solid #f0f0f0;
        }
        @media (min-width: 1024px) {
            .service-card:hover { transform: translateY(-10px); border-color: var(--orange-main); }
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
        }
        @media (min-width: 768px) {
            .gallery-grid { grid-template-columns: repeat(2, 1fr); }
            .gallery-item-wide { grid-column: span 2; }
        }
        @media (min-width: 1024px) {
            .gallery-grid { grid-template-columns: repeat(3, 1fr); }
        }

        .btn-orange {
            background-color: var(--orange-main); color: white;
            transition: all 0.3s ease;
        }
        .btn-orange:hover { background-color: var(--orange-hover); transform: scale(1.05); }
        
        .reveal-up { opacity: 0; transform: translateY(30px); }
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-15px); } }
        .floating { animation: float 4s ease-in-out infinite; }

        .logo-item {
        height: 60px;
        margin: 0 40px;
        filter: grayscale(100%);
        opacity: 0.3;
        transition: all 0.4s ease;
        border-radius: 4px;
    }

    .logo-item:hover {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.1);
    }

    /* Hide scrollbar but keep functionality */
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

    /* Infinite Animations */
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    @keyframes reverse-marquee {
        0% { transform: translateX(-50%); }
        100% { transform: translateX(0); }
    }

    .animate-marquee {
        animation: marquee 30s linear infinite;
        display: flex;
        width: max-content;
    }

    .animate-reverse-marquee {
        animation: reverse-marquee 30s linear infinite;
        display: flex;
        width: max-content;
    }

    /* Pause on Hover */
    .animate-marquee:hover, .animate-reverse-marquee:hover {
        animation-play-state: paused;
    }
    </style>
</head>
<body>

    <div id="loader" class="fixed inset-0 z-[200] bg-white flex items-center justify-center">
        <div class="text-center">
            <div class="w-12 h-12 border-4 border-gray-100 border-t-[#FF6B00] rounded-full animate-spin mb-4 mx-auto"></div>
            <h1 class="font-sync text-sm tracking-widest text-black">S G GROUP INDIA</h1>
        </div>
    </div>

    <div id="mobile-menu" class="fixed inset-0 z-[160] bg-white flex flex-col items-center justify-center space-y-8 font-sync text-xl lg:hidden">
        <button onclick="toggleMenu()" class="absolute top-8 right-8 text-2xl"><i class="fas fa-times"></i></button>
        <a href="#about" onclick="toggleMenu()">Legacy</a>
        <a href="#services" onclick="toggleMenu()">Services</a>
        <a href="#construction" onclick="toggleMenu()">Sectors</a>
        <a href="#gallery" onclick="toggleMenu()">Portfolio</a>
        <a href="#contact" onclick="toggleMenu()" class="btn-orange px-8 py-3 rounded-full text-white text-sm">Get Started</a>
    </div>

    <nav id="navbar" class="fixed top-0 w-full z-[150] px-6 lg:px-12 py-6 flex justify-between items-center transition-all duration-500 nav-transparent">
        <div class="font-sync text-xl lg:text-2xl font-bold tracking-tighter">
            S G <span class="text-[#FF6B00]">GROUP</span>
        </div>
        <div class="hidden lg:flex space-x-8 items-center text-[10px] font-bold uppercase tracking-widest">
            <a href="#about" class="hover:text-[#FF6B00] transition">Legacy</a>
            <a href="#services" class="hover:text-[#FF6B00] transition">Services</a>
            <a href="#construction" class="hover:text-[#FF6B00] transition">Sectors</a>
            <a href="#cinema" class="hover:text-[#FF6B00] transition">Cinema</a>
            <a href="#gallery" class="hover:text-[#FF6B00] transition">Portfolio</a>
            <a href="#contact" class="btn-orange px-8 py-3 rounded-full text-white">Get Started</a>
        </div>
        <button onclick="toggleMenu()" class="lg:hidden text-xl"><i class="fas fa-bars-staggered"></i></button>
    </nav>

    <section class="min-h-screen flex flex-col lg:flex-row overflow-hidden">

<!-- Panel 1 -->
<div class="hero-panel relative group border-b lg:border-b-0 lg:border-r border-white/10 overflow-hidden w-full lg:w-1/2">
    <div class="hero-img-container relative w-full h-full">
        
        <div class="hero-slide absolute inset-0 opacity-100 z-10 transition-opacity duration-1000">
        <img src="/storage/images/construction-site.png"
 class="w-full h-full object-cover"
 alt="Construction">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <div class="hero-slide absolute inset-0 opacity-0 z-0 transition-opacity duration-1000">
            <img src="/storage/images/Const.jpg?q=80&w=2070&auto=format&fit=crop"
                 class="w-full h-full object-cover" alt="Construction">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <div class="hero-slide absolute inset-0 opacity-0 z-0 transition-opacity duration-1000">
            <img src="/storage/images/Constructionimage1.jpg?q=80&w=2070&auto=format&fit=crop"
                 class="w-full h-full object-cover" alt="Construction">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

    </div>

    <!-- Text content -->
    <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-6 z-20 pointer-events-none">
        <h2 class="font-sync text-5xl lg:text-4xl text-white mb-6 tracking-tighter" style="text-shadow: 0 10px 30px rgba(0,0,0,0.8);">Construction Services</h2>
        <div class="w-20 h-1 bg-[#FF6B00] mb-8"></div>
        <p class="text-gray-100 max-w-lg mb-10 text-base lg:text-lg leading-relaxed font-light">
            The construction industry involves the planning, design, building, and maintenance of structures, requiring collaboration between skilled professionals, engineers, and specialized trades to deliver high-quality projects.
        </p>
        <a href="{{ url('/services') }}"
           class="pointer-events-auto border border-white/50 px-10 py-4 text-white text-sm font-bold uppercase tracking-widest hover:bg-[#FF6B00] hover:border-[#FF6B00] transition-all">
           Explore Sector
        </a>
    </div>
</div>

<!-- Panel 2 -->
<div class="hero-panel relative group overflow-hidden w-full lg:w-1/2">
    <div class="hero-img-container relative w-full h-full">
        <div class="hero-slide absolute inset-0 opacity-100 z-10 transition-opacity duration-1000">
            <img src="/storage/images/cargo.png?q=80&w=2070&auto=format&fit=crop"
                 class="w-full h-full object-cover" alt="Trade">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <div class="hero-slide absolute inset-0 opacity-0 z-0 transition-opacity duration-1000">
            <img src="/storage/images/mac.jpg?q=80&w=2070&auto=format&fit=crop"
                 class="w-full h-full object-cover" alt="Trade">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <div class="hero-slide absolute inset-0 opacity-0 z-0 transition-opacity duration-1000">
            <img src="/storage/images/trade.jpg?q=80&w=2070&auto=format&fit=crop"
                 class="w-full h-full object-cover" alt="Trade">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>
    </div>

    <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-6 z-20 pointer-events-none">
        <h2 class="font-sync text-5xl lg:text-4xl text-white mb-6 tracking-tighter" style="text-shadow: 0 10px 30px rgba(0,0,0,0.8);">Importer & Traders</h2>
        <div class="w-20 h-1 bg-[#FF6B00] mb-8"></div>
        <p class="text-gray-100 max-w-lg mb-10 text-base lg:text-lg leading-relaxed font-light">
        Our company provides a wide range of construction machines and industrial equipment for trade, including advanced wire saw machines, concrete cutting tools, and heavy construction machinery. We ensure high performance, durability, and cost-effective solutions for contractors and engineering projects.
        </p>
        <a href="{{ url('/products') }}"
           class="pointer-events-auto border border-white/50 px-10 py-4 text-white text-sm font-bold uppercase tracking-widest hover:bg-[#FF6B00] hover:border-[#FF6B00] transition-all">
           Explore Logistics
        </a>
    </div>
</div>

</section>

    <section class="py-20 bg-black border-t border-white/5 relative group">
    <div class="container mx-auto px-6 mb-12">
        <div class="flex items-center gap-4">
            <div class="h-[1px] w-12 bg-[#FF6B00]"></div>
            <span class="text-[#FF6B00] font-sync text-[9px] tracking-[0.4em] uppercase">Market Presence</span>
        </div>

        <h2 class="font-sync text-2xl lg:text-4xl font-bold mt-4 uppercase tracking-tighter">
            <span class="text-white">OUR</span> 
            <span class="text-outline text-transparent" style="-webkit-text-stroke: 1px rgba(255,255,255,0.7);">CLIENT</span> 
            <span class="text-white">PORTFOLIO</span>
        </h2>
    </div>

    <button onclick="scrollLogos(-300)" class="absolute left-4 top-1/2 z-10 bg-black/50 border border-white/10 w-12 h-12 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity hover:bg-[#FF6B00]">
        <i class="fa-solid fa-chevron-left text-white"></i>
    </button>
    <button onclick="scrollLogos(300)" class="absolute right-4 top-1/2 z-10 bg-black/50 border border-white/10 w-12 h-12 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity hover:bg-[#FF6B00]">
        <i class="fa-solid fa-chevron-right text-white"></i>
    </button>

    <div id="logoContainer" class="flex flex-col gap-8 overflow-x-auto no-scrollbar scroll-smooth">
        
        <div class="flex animate-marquee whitespace-nowrap">
            <div class="flex items-center">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
            </div>
            <div class="flex items-center">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
            </div>
        </div>

        <div class="flex animate-reverse-marquee whitespace-nowrap">
            <div class="flex items-center">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
            </div>
            <div class="flex items-center">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
                <img src="https://placehold.co/200x80/333/ccc?text=CLIENT+LOGO" style="opacity: 0.8; filter: grayscale(0);" class="logo-item" alt="Client Logo">
            </div>
        </div>
    </div>
</section>

    <section id="about" class="py-20 lg:py-32 bg-[#F8F9FA] px-6 lg:px-12">
        <div class="container mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <div class="reveal-up">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-2 h-2 bg-[#FF6B00] rounded-full"></div>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[#FF6B00]">Corporate Overview</span>
                    </div>
                    <h2 class="text-4xl lg:text-7xl font-extrabold text-slate-900 leading-tight mb-8">
                        The Core of <br><span class="text-gray-300 italic">Modern Industry.</span>
                    </h2>
                    <p class="text-gray-500 text-base lg:text-lg leading-relaxed mb-10 max-w-xl">
                    To become a leading engineering and construction services company in the region by delivering high quality, innovative, and reliable construction solutions that meet international standards.
                    </p>
                    <div class="grid grid-cols-2 gap-6 lg:gap-10">
                        <div class="p-6 lg:p-8 bg-white rounded-3xl shadow-sm border border-gray-100">
                            <h3 class="text-3xl lg:text-4xl font-black text-[#FF6B00]">25yr+</h3>
                            <p class="text-[9px] font-bold uppercase tracking-widest text-gray-400">Years of experience with proud</p>
                        </div>
                        <div class="p-6 lg:p-8 bg-white rounded-3xl shadow-sm border border-gray-100">
                            <h3 class="text-3xl lg:text-4xl font-black text-[#FF6B00] counter" data-target="512">0</h3>
                            <p class="text-[9px] font-bold uppercase tracking-widest text-gray-400">Successfully Project Finished.</p>
                        </div>
                    </div>
                </div>
                <div class="relative reveal-up hidden lg:block">
                    <div class="absolute -top-10 -left-10 w-40 h-40 bg-[#FF6B00] rounded-full z-0 opacity-10 floating"></div>
                    <img src="/storage/images/hero.jpg?q=80&w=2070&auto=format&fit=crop" class="rounded-[3rem] shadow-2xl relative z-10 grayscale" alt="Industry Leadership">
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="py-20 lg:py-32 bg-white px-6 lg:px-12">
    <div class="container mx-auto">

        <!-- Header -->
        <div class="mb-12 lg:mb-20 flex flex-col lg:flex-row justify-between items-end gap-6">
            <div>
                <h2 class="font-sync text-3xl lg:text-4xl uppercase">
                    Our <span class="text-[#FF6B00]">Products</span>
                </h2>
                <p class="text-gray-400 text-[10px] tracking-[0.2em] uppercase">
                    Engineering precision for complex projects
                </p>
            </div>

            <!-- SEE ALL BUTTON -->
            <a href="{{ url('/products') }}"
               class="bg-black text-white px-6 py-3 rounded-xl text-[10px] uppercase tracking-widest hover:bg-[#FF6B00] transition">
               See All
            </a>
        </div>

        <!-- Carousel -->
        <div class="relative overflow-hidden">

            <!-- Track -->
            <div id="productTrack" class="flex gap-8 transition-transform duration-500">
                
                @foreach($products as $product)
                <div class="min-w-[100%] md:min-w-[48%] lg:min-w-[30%] service-card-modern group">
                    
                    <img src="{{ asset('storage/'.$product->image) }}"
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                    <div class="service-overlay text-white">
                        <h3 class="text-2xl font-bold mb-4">
                            {{ $product->name }}
                        </h3>

                        <a href="{{ route('product.show', $product->id) }}"
                           class="w-fit bg-white text-black px-8 py-3 rounded-xl text-[10px] font-bold uppercase tracking-widest hover:bg-[#FF6B00] hover:text-white transition">
                           Read More
                        </a>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- LEFT BUTTON -->
            <button onclick="moveSlide(-1)"
                class="absolute left-0 top-1/2 -translate-y-1/2 bg-black text-white w-10 h-10 rounded-full z-10">
                <i class="fa fa-chevron-left"></i>
            </button>

            <!-- RIGHT BUTTON -->
            <button onclick="moveSlide(1)"
                class="absolute right-0 top-1/2 -translate-y-1/2 bg-black text-white w-10 h-10 rounded-full z-10">
                <i class="fa fa-chevron-right"></i>
            </button>

        </div>
    </div>
</section>


<section id="services" class="py-20 lg:py-32 bg-[#020202] px-6 lg:px-12">
    <div class="container mx-auto">

        <!-- HEADER -->
        <div class="mb-12 lg:mb-20 flex flex-col lg:flex-row justify-between items-end gap-6">
            <div>
                <h2 class="font-sync text-3xl lg:text-4xl uppercase text-white">
                    Our <span class="text-[#FF6B00]">Services</span>
                </h2>
                <p class="text-gray-500 text-[10px] tracking-[0.2em] uppercase">
                    What we deliver with excellence
                </p>
            </div>

            <a href="{{ url('/services') }}"
               class="border border-white/20 text-white px-6 py-3 rounded-xl text-[10px] uppercase tracking-widest hover:border-[#FF6B00] hover:text-[#FF6B00] transition">
               Explore All
            </a>
        </div>

        <!-- CAROUSEL -->
        <div class="relative overflow-hidden">

            <!-- TRACK -->
            <div id="serviceTrack" class="flex gap-8 transition-transform duration-500">

                @foreach($services as $service)
                <div class="min-w-[100%] md:min-w-[48%] lg:min-w-[30%] group relative">

                    <!-- CARD -->
                    <div class="relative rounded-3xl overflow-hidden border border-white/10">

                        <!-- IMAGE -->
                        <img src="{{ asset('storage/'.$service->image) }}"
                             class="w-full h-[420px] object-cover transition duration-700 group-hover:scale-105">

                        <!-- GRADIENT OVERLAY -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>

                        <!-- CONTENT -->
                        <div class="absolute bottom-0 p-6">

                            <h3 class="text-xl font-semibold text-white mb-3">
                                {{ $service->name }}
                            </h3>

                            <a href="{{ route('services.show', $service->id) }}"
                               class="inline-block bg-[#FF6B00] text-white px-6 py-2 rounded-lg text-[10px] uppercase tracking-widest hover:bg-white hover:text-black transition">
                               Learn More
                            </a>

                        </div>
                    </div>

                </div>
                @endforeach

            </div>

            <!-- LEFT -->
            <button onclick="moveService(-1)"
                class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/10 backdrop-blur w-10 h-10 rounded-full text-white hover:bg-[#FF6B00] transition">
                <i class="fa fa-chevron-left"></i>
            </button>

            <!-- RIGHT -->
            <button onclick="moveService(1)"
                class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/10 backdrop-blur w-10 h-10 rounded-full text-white hover:bg-[#FF6B00] transition">
                <i class="fa fa-chevron-right"></i>
            </button>

        </div>
    </div>
</section>

    <!--<section id="construction" class="py-20 lg:py-32 bg-gray-50 px-6 lg:px-12">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="service-card p-10 lg:p-12 rounded-[2.5rem] reveal-up">
                    <div class="w-12 h-12 lg:w-16 lg:h-16 bg-[#FF6B00]/10 rounded-2xl flex items-center justify-center mb-8">
                        <i class="fas fa-hard-hat text-[#FF6B00] text-2xl lg:text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-6">Civil Works</h3>
                    <p class="text-gray-500 text-sm mb-8 leading-relaxed">Structural engineering for airports and highways via BIM integration.</p>
                    <ul class="space-y-4 text-[9px] font-bold uppercase tracking-widest text-gray-400">
                        <li><span class="text-[#FF6B00] mr-2">//</span> Piling & Foundation</li>
                        <li><span class="text-[#FF6B00] mr-2">//</span> Heavy Logistics</li>
                    </ul>
                </div>
                <div class="service-card p-10 lg:p-12 rounded-[2.5rem] reveal-up">
                    <div class="w-12 h-12 lg:w-16 lg:h-16 bg-[#FF6B00]/10 rounded-2xl flex items-center justify-center mb-8">
                        <i class="fas fa-ship text-[#FF6B00] text-2xl lg:text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-6">Trade Logistics</h3>
                    <p class="text-gray-500 text-sm mb-8 leading-relaxed">End-to-end maritime supply chain and real-time fleet tracking.</p>
                    <ul class="space-y-4 text-[9px] font-bold uppercase tracking-widest text-gray-400">
                        <li><span class="text-[#FF6B00] mr-2">//</span> Commodity Export</li>
                        <li><span class="text-[#FF6B00] mr-2">//</span> Customs Intelligence</li>
                    </ul>
                </div>
                <div class="service-card p-10 lg:p-12 rounded-[2.5rem] reveal-up md:col-span-2 lg:col-span-1">
                    <div class="w-12 h-12 lg:w-16 lg:h-16 bg-[#FF6B00]/10 rounded-2xl flex items-center justify-center mb-8">
                        <i class="fas fa-pencil-ruler text-[#FF6B00] text-2xl lg:text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-6">Architecture</h3>
                    <p class="text-gray-500 text-sm mb-8 leading-relaxed">Sustainable blueprint design and LEED material selection.</p>
                    <ul class="space-y-4 text-[9px] font-bold uppercase tracking-widest text-gray-400">
                        <li><span class="text-[#FF6B00] mr-2">//</span> Sustainable Blueprinting</li>
                        <li><span class="text-[#FF6B00] mr-2">//</span> Efficiency Analysis</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>-->

    <section id="cinema" class="py-20 lg:py-32 bg-gray-50 px-6 lg:px-12">
  <div class="container mx-auto">
    
    <!-- Heading -->
    <div class="text-center mb-12 reveal-up">
      <h2 class="font-sync text-2xl lg:text-4xl mb-4 uppercase">
        Industrial <span class="text-[#FF6B00]">Cinema</span>
      </h2>

      <!-- YouTube Button -->
      <a href="https://www.youtube.com/@SGGROUP-9333/videos" 
         target="_blank"
         class="inline-block mt-4 px-6 py-3 bg-[#FF6B00] text-white rounded-full hover:scale-105 transition shadow-lg">
        Watch More on YouTube
      </a>
    </div>

    <!-- Videos Layout -->
    <div class="lg:flex lg:gap-8 items-stretch">
      
      <!-- LEFT: Big Video -->
      <div class="lg:w-2/3 mb-8 lg:mb-0 reveal-up">
        <div class="rounded-3xl overflow-hidden h-full">
          <iframe 
            class="w-full h-[300px] lg:h-[500px]" 
            src="https://www.youtube.com/embed/5a6fKdb13Lk" 
            title="Main Video"
            frameborder="0" 
            allowfullscreen>
          </iframe>
        </div>
      </div>

      <!-- RIGHT: 2 Small Videos -->
      <div class="lg:w-1/3 flex flex-col gap-6 reveal-up">
        
        <div class="rounded-3xl overflow-hidden">
          <iframe 
            class="w-full h-[150px] lg:h-[240px]" 
            src="https://www.youtube.com/embed/O-XIEtBoJ_g" 
            title="Video 2"
            frameborder="0" 
            allowfullscreen>
          </iframe>
        </div>

        <div class="rounded-3xl overflow-hidden">
          <iframe 
            class="w-full h-[150px] lg:h-[240px]" 
            src="https://www.youtube.com/embed/WeKBzRVIrNQ" 
            title="Video 3"
            frameborder="0" 
            allowfullscreen>
          </iframe>
        </div>

      </div>

    </div>
  </div>
</section>
    <section id="gallery" class="py-20 lg:py-32 bg-white px-6 lg:px-12">
        <div class="container mx-auto">
            <h2 class="font-sync text-center text-2xl lg:text-3xl mb-16 lg:mb-24 uppercase">Project Showcase</h2>
            <div class="gallery-grid">
                <div class="gallery-item-wide rounded-3xl overflow-hidden h-64 lg:h-80 reveal-up">
                    <img src="/storage/images/gallery1.jpeg?q=80&w=1000" class="w-full h-full object-cover">
                </div>
                <div class="rounded-3xl overflow-hidden h-64 lg:h-80 reveal-up">
                    <img src="/storage/images/gallery12.jpg?q=80&w=1000" class="w-full h-full object-cover">
                </div>
                <div class="rounded-3xl overflow-hidden h-64 lg:h-80 reveal-up">
                    <img src="/storage/images/gallery3.jpeg?q=80&w=1000" class="w-full h-full object-cover">
                </div>
                <div class="rounded-3xl overflow-hidden h-64 lg:h-80 reveal-up">
                    <img src="/storage/images/gallery4.jpeg?q=80&w=1000" class="w-full h-full object-cover">
                </div>
                <div class="rounded-3xl overflow-hidden h-64 lg:h-80 reveal-up">
                    <img src="/storage/images/gallery5.jpeg?q=80&w=1000" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 lg:py-32 bg-[#1A1C1E] text-white px-6 lg:px-12">
  <div class="container mx-auto">

    <!-- Heading -->
    <div class="text-center mb-16 reveal-up">
      <h2 class="font-sync text-3xl lg:text-4xl uppercase tracking-tighter">
        About Our <span class="text-[#FF6B00]">Company</span>
      </h2>
      <p class="text-gray-400 mt-4 max-w-2xl mx-auto text-base lg:text-lg leading-relaxed">
        We are a trusted engineering, construction, and machinery trading company, committed to delivering high-quality construction solutions and industrial equipment. Our focus is on innovation, reliability, and customer satisfaction, ensuring every project meets the highest standards of performance and safety.
      </p>
    </div>

    <!-- Content -->
    <div class="grid lg:grid-cols-2 gap-16 items-center">

      <!-- Left Content -->
      <div class="space-y-8 reveal-up">
        
        <h3 class="text-2xl lg:text-3xl font-semibold">
          Quality Services & Commitment
        </h3>

        <p class="text-gray-300 text-base lg:text-lg leading-relaxed">
          We deliver comprehensive construction services and supply advanced machinery, including wire saw machines and industrial equipment. Our mission is to provide durable, efficient, and cost-effective solutions while maintaining long-term relationships built on trust, integrity, and excellence.
        </p>

        <p class="text-gray-400 text-base lg:text-lg leading-relaxed">
          From planning and execution to delivery, we ensure every project is completed on time using modern technology, latest designs, and industry best practices. We are dedicated to creating sustainable solutions that keep people safe and support future growth.
        </p>

        <!-- Button -->
        <a href="{{ url('/contact') }}"
           class="inline-block mt-4 px-8 py-4 bg-[#FF6B00] text-white uppercase text-sm font-bold tracking-widest rounded-full hover:scale-105 transition shadow-lg">
          Get In Touch
        </a>

      </div>

      <!-- Right Content (Highlights / Features) -->
      <div class="grid grid-cols-2 gap-6 reveal-up">

        <div class="bg-white/5 p-6 rounded-2xl border-l-4 border-[#FF6B00]">
          <h4 class="text-lg font-bold mb-2">Sustainability</h4>
          <p class="text-gray-400 text-sm">Eco-friendly and sustainable construction practices for long-term impact.</p>
        </div>

        <div class="bg-white/5 p-6 rounded-2xl border-l-4 border-[#FF6B00]">
          <h4 class="text-lg font-bold mb-2">On-Time Delivery</h4>
          <p class="text-gray-400 text-sm">Efficient project management ensuring timely completion of all projects.</p>
        </div>

        <div class="bg-white/5 p-6 rounded-2xl border-l-4 border-[#FF6B00]">
          <h4 class="text-lg font-bold mb-2">Modern Technology</h4>
          <p class="text-gray-400 text-sm">Utilizing advanced machinery and innovative construction solutions.</p>
        </div>

        <div class="bg-white/5 p-6 rounded-2xl border-l-4 border-[#FF6B00]">
          <h4 class="text-lg font-bold mb-2">Latest Designs</h4>
          <p class="text-gray-400 text-sm">Creative and modern design approaches tailored to client needs.</p>
        </div>

      </div>

    </div>

  </div>
</section>

    <section id="contact" class="py-20 bg-white px-6 lg:px-20 border-t border-gray-100">
    <div class="container mx-auto max-w-6xl">
        <div class="flex flex-col lg:flex-row gap-16">
            
            <div class="lg:w-1/3">
                <span class="text-[#FF6B00] font-sync text-[9px] tracking-[0.5em] uppercase block mb-6">Contact Us</span>
                <h2 class="font-sync text-4xl lg:text-5xl font-extrabold leading-[1.1] uppercase tracking-tighter text-black mb-8">
                    Let's <br>Connect.
                </h2>
                <div class="space-y-4 text-[10px] font-bold uppercase tracking-widest text-gray-400">
                    <p class="flex items-center gap-3"><i class="fas fa-map-marker-alt text-[#FF6B00]"></i> Pune, India</p>
                    <p class="flex items-center gap-3"><i class="fas fa-envelope text-[#FF6B00]"></i>  sggrouppune@gmail.com</p>
                </div>
            </div>

            <div class="lg:w-2/3">
                <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-10">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-10">
                        <div class="group">
                            <label class="text-[9px] font-bold uppercase tracking-widest text-gray-400 group-focus-within:text-[#FF6B00] transition-colors">Your Name</label>
                            <input type="text" name="name" required placeholder="Enter Name" class="w-full border-b-2 border-gray-100 py-3 outline-none focus:border-[#FF6B00] text-[11px] font-bold tracking-widest transition-all bg-transparent ">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="group">
                            <label class="text-[9px] font-bold uppercase  tracking-widest text-gray-400 group-focus-within:text-[#FF6B00] transition-colors">Phone Number</label>
                            <input type="tel" name="phone" required pattern="[0-9]{10}" placeholder="10-Digit Mobile Number" class="w-full border-b-2 border-gray-100 py-3 outline-none focus:border-[#FF6B00] text-[11px] font-bold tracking-widest transition-all bg-transparent ">
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="group">
                        <label class="text-[9px] font-bold uppercase tracking-widest text-gray-400 group-focus-within:text-[#FF6B00] transition-colors">Work Email</label>
                        <input type="email" name="email" required placeholder="email@company.com" class="w-full border-b-2 border-gray-100 py-3 outline-none focus:border-[#FF6B00] text-[11px] font-bold tracking-widest transition-all bg-transparent ">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="group">
                        <label class="text-[9px] font-bold uppercase tracking-widest text-gray-400 group-focus-within:text-[#FF6B00] transition-colors">Project Brief</label>
                        <textarea name="message" required placeholder="Describe your requirements..." rows="5" class="w-full border-2 border-gray-50 p-4 mt-2 outline-none focus:border-[#FF6B00] text-[11px] font-bold tracking-widest transition-all bg-gray-50  resize-y min-h-[150px]"></textarea>
                        @error('message')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-[#FF6B00] hover:bg-black text-white px-12 py-5 rounded-full font-sync text-[10px] uppercase tracking-[0.4em] transition-all duration-500 shadow-xl hover:shadow-orange-100">
                        Send Inquiry <i class="fa-solid fa-paper-plane ml-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
<div id="thankYouModal" class="fixed inset-0 bg-black/60 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-2xl p-8 text-center max-w-md w-full shadow-xl">
        <h2 class="text-xl font-bold mb-4">Thank You!</h2>
        <p class="text-gray-600 mb-6">Your inquiry has been submitted successfully.</p>
        <button onclick="closeModal()" class="bg-[#FF6B00] text-white px-6 py-2 rounded-full">
            Close
        </button>
    </div>
</div>
<footer class="py-12 lg:py-20 bg-white px-6 lg:px-12 border-t border-gray-100">
  <div class="container mx-auto grid md:grid-cols-3 gap-10 text-sm text-gray-500">

    <!-- Company Info -->
    <div>
      <div class="font-sync text-2xl text-black mb-4">
        S G <span class="text-[#FF6B00]">GROUP</span>
      </div>
      <p class="leading-relaxed">
        Trusted engineering, construction, and machinery trading company delivering quality services and innovative solutions across India.
      </p>
    </div>

    <!-- Contact Info -->
    <div>
      <h3 class="text-black font-bold mb-4 uppercase tracking-widest text-xs">Contact Us</h3>
      <p class="mb-3">
        Shop No 9 S.M. Shinde, Near Hotel Appel,<br>
        Pune Mumbai Road, Kasawadi,<br>
        Pune - 411034
      </p>
      <p class="mb-2">📞 +91 9850100284</p>
      <p class="mb-2">📞 +91 9881820284</p>
      <p class="mb-2">✉️ sggrouppune@gmail.com</p>
    </div>

    <!-- Working Hours + Links -->
    <div>
      <h3 class="text-black font-bold mb-4 uppercase tracking-widest text-xs">Working Hours</h3>
      <p class="mb-3">Mon - Sat: 8:00 AM - 5:30 PM</p>
      <p class="mb-6">Sunday: Closed</p>

      <div class="flex gap-6 text-xs font-bold uppercase tracking-widest">
        <a href="#" class="hover:text-black">Privacy</a>
        <a href="#" class="hover:text-black">Terms</a>
      </div>
    </div>

  </div>

  <!-- Bottom Bar -->
  <div class="mt-10 pt-6 border-t border-gray-200 text-center text-xs text-gray-400 font-bold tracking-widest">
    © 2026 S G Group India International. All Rights Reserved.
  </div>
</footer>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        function toggleMenu() {
            document.getElementById('mobile-menu').classList.toggle('active');
        }

        window.addEventListener('load', () => {
            gsap.to("#loader", { yPercent: -100, duration: 1, ease: "expo.inOut", delay: 0.5 });
        });

        window.addEventListener('scroll', () => {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 50) {
                nav.classList.add('nav-scrolled', 'py-4');
                nav.classList.remove('nav-transparent', 'py-6');
            } else {
                nav.classList.add('nav-transparent', 'py-6');
                nav.classList.remove('nav-scrolled', 'py-4');
            }
        });

        gsap.to("#ticker", { xPercent: -50, repeat: -1, duration: 20, ease: "linear" });

        document.querySelectorAll('.reveal-up').forEach(el => {
            gsap.to(el, {
                scrollTrigger: { trigger: el, start: "top 95%" },
                y: 0, opacity: 1, duration: 1.2, ease: "power3.out"
            });
        });

        document.querySelectorAll('.counter').forEach(counter => {
            const target = +counter.getAttribute('data-target');
            gsap.to(counter, {
                scrollTrigger: { trigger: counter, start: "top 90%" },
                innerText: target,
                duration: 2,
                snap: { innerText: 1 }
            });
        });

        function scrollLogos(distance) {
        const container = document.getElementById('logoContainer');
        container.scrollBy({
            left: distance,
            behavior: 'smooth'
        });
    }

    function closeModal() {
        document.getElementById('thankYouModal').classList.add('hidden');
    }

    @if(session('success'))
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('thankYouModal').classList.remove('hidden');
        });
    @endif

    let position = 0;

function moveSlide(direction) {
    const track = document.getElementById('productTrack');
    const cards = track.children.length;

    let visible = window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 768 ? 2 : 1);

    position += direction;

    if (position < 0) position = 0;
    if (position > cards - visible) position = cards - visible;

    const cardWidth = track.children[0].offsetWidth + 32; // gap
    track.style.transform = `translateX(-${position * cardWidth}px)`;
}
    </script>
    <script>
let serviceIndex = 0;

function moveService(direction){
    const track = document.getElementById('serviceTrack');
    const total = track.children.length;

    serviceIndex += direction;

    if(serviceIndex < 0) serviceIndex = total - 1;
    if(serviceIndex >= total) serviceIndex = 0;

    const width = track.children[0].offsetWidth + 32; // gap
    track.style.transform = `translateX(-${serviceIndex * width}px)`;
}
</script>
<script>
    const panels = document.querySelectorAll('.hero-img-container');

    panels.forEach(panel => {
        const slides = panel.querySelectorAll('.hero-slide');
        let index = 0;

        setInterval(() => {
            slides.forEach((slide, i) => {
                slide.style.opacity = (i === index) ? '1' : '0';
                slide.style.zIndex = (i === index) ? '10' : '0';
            });

            index = (index + 1) % slides.length;
        }, 4000); // change every 4 seconds
    });
</script>
</body>
</html>