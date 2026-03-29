<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'S G Group India')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syncopate:wght@400;700&family=Inter:wght@300;400;600&display=swap');
        
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #000; 
            color: #fff; 
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100-vh;
        }
        .font-sync { font-family: 'Syncopate', sans-serif; }

        header {
            background-color: #000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Common Footer Styling */
        footer {
            background: #050505;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding: 4rem 2rem;
            text-align: center;
        }
    </style>
    @yield('extra_styles')
</head>
<body>

    <header class="w-full px-6 py-8 flex justify-between items-center relative z-50">
        <div class="font-sync text-xl lg:text-2xl font-bold uppercase tracking-tighter">
            S G <span class="text-[#FF6B00]">Group</span>
        </div>
        <nav class="flex gap-6 items-center">
            <a href="{{ url('/') }}" class="text-[10px] font-sync font-bold uppercase tracking-widest hover:text-[#FF6B00] transition-colors">Home</a>
            <a href="{{ url('/contact') }}" class="text-[10px] font-sync font-bold uppercase tracking-widest text-[#FF6B00]">Contact</a>
        </nav>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer>
        <div class="font-sync text-lg font-bold uppercase tracking-tighter mb-4">
            S G <span class="text-[#FF6B00]">Group</span>
        </div>
        <p class="text-[9px] font-sync text-gray-500 uppercase tracking-[0.4em]">
            © 2026 Industrial Excellence. All Rights Reserved.
        </p>
    </footer>
    @yield('scripts')
</body>
</html>