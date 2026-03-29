@extends('layouts.app')

@section('title', 'Contact Us | S G Group India')

@section('extra_styles')
<style>
    /* Input styling for maximum readability */
    .form-input {
        width: 100%;
        background: #111;
        border: 1px solid #222;
        border-radius: 8px;
        padding: 1rem;
        color: #fff;
        font-size: 14px;
        outline: none;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        border-color: #FF6B00;
        background: #1a1a1a;
    }

    .input-label {
        display: block;
        font-family: 'Syncopate', sans-serif;
        font-size: 10px;
        letter-spacing: 0.15em;
        color: #FF6B00;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        font-weight: 700;
    }
</style>
@endsection

@section('content')
<div class="py-12 lg:py-24 px-6">
    <div class="container mx-auto max-w-6xl">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-24">
            
            <div class="flex flex-col justify-center">
                <span class="text-[#FF6B00] font-sync text-[10px] tracking-[0.4em] uppercase mb-4 block">Get in Touch</span>
                <h1 class="font-sync text-4xl lg:text-6xl font-bold uppercase leading-tight mb-6">
                    Start The <br><span class="text-[#FF6B00]">Dialogue.</span>
                </h1>
                <p class="text-gray-400 text-sm lg:text-base leading-relaxed mb-10 max-w-md">
                    Have a project in mind? Our team of industrial experts is ready to help you with precision wall cutting, core drilling, and more.
                </p>
                
                <div class="space-y-6 border-l-2 border-[#FF6B00] pl-6">
                    <div>
                        <p class="text-[9px] font-sync text-gray-500 uppercase tracking-widest">General Enquiries</p>
                        <p class="text-lg font-medium">contact@sggroupindia.com</p>
                    </div>
                    <div>
                        <p class="text-[9px] font-sync text-gray-500 uppercase tracking-widest">Office Base</p>
                        <p class="text-lg font-medium">Mumbai, Maharashtra, India</p>
                    </div>
                </div>
            </div>

            <div class="bg-[#0a0a0a] p-8 lg:p-12 rounded-[2rem] border border-white/5 shadow-2xl">
                <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-8">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="input-label">Full Name</label>
                            <input type="text" name="name" required placeholder="Enter Name" class="form-input">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="input-label">Phone Number</label>
                            <input type="tel" name="phone" required pattern="[0-9]{10}" placeholder="10-Digit Mobile" class="form-input">
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="input-label">Work Email</label>
                        <input type="email" name="email" required placeholder="email@company.com" class="form-input">
                        @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                    </div>

                    <div>
                        <label class="input-label">Message</label>
                        <textarea name="message" required rows="5" placeholder="Tell us about your requirements..." class="form-input resize-y min-h-[120px]"></textarea>
                        @error('message')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full bg-[#FF6B00] hover:bg-white text-white hover:text-black py-5 rounded-xl font-sync text-[11px] uppercase tracking-[0.3em] transition-all duration-500 shadow-lg shadow-orange-500/10">
                        Submit Inquiry
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
<div id="thankYouModal" class="fixed inset-0 bg-black/60 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-2xl p-8 text-center max-w-md w-full shadow-xl">
        <h2 class="text-xl font-bold mb-4" style="color:#000;">Thank You!</h2>
        <p class="text-gray-600 mb-6">Your inquiry has been submitted successfully.</p>
        <button onclick="closeModal()" class="bg-[#FF6B00] text-white px-6 py-2 rounded-full">
            Close
        </button>
    </div>
</div>
<script>
    function closeModal() {
        document.getElementById('thankYouModal').classList.add('hidden');
    }

    @if(session('success'))
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('thankYouModal').classList.remove('hidden');
        });
    @endif
</script>
@endsection