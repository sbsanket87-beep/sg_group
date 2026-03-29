<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry Panel | S G Group</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syncopate:wght@400;700&family=Inter:wght@300;400;600&display=swap');
        
        body { font-family: 'Inter', sans-serif; background-color: #020202; }
        .font-sync { font-family: 'Syncopate', sans-serif; }

        .glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .active-tab {
            background: #FF6B00;
            color: white;
            box-shadow: 0 0 20px rgba(255, 107, 0, 0.3);
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #000; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #FF6B00; }
    </style>
</head>

<body class="text-white p-4 lg:p-10 min-h-screen">

<div class="max-w-6xl mx-auto">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">

        <div>
            <div class="flex items-center gap-3 mb-2">
                <div class="h-[2px] w-8 bg-[#FF6B00]"></div>
                <span class="text-[#FF6B00] font-sync text-[9px] tracking-[0.4em] uppercase">Admin Control</span>
            </div>
            <h1 class="text-3xl font-sync font-bold tracking-tighter uppercase">
                Inquiry <span class="text-transparent" style="-webkit-text-stroke: 1px #fff;">Panel</span>
            </h1>
        </div>

        <!-- RIGHT SIDE (Tabs + Logout) -->
        <div class="flex items-center gap-4 flex-wrap">

            <div class="flex p-1 bg-white/5 rounded-full border border-white/10">
                <button onclick="showTab('unread')" id="tab-unread"
                    class="tab-btn active-tab px-8 py-2.5 rounded-full text-[10px] font-sync uppercase tracking-widest transition-all">
                    Unread
                </button>
                <button onclick="showTab('read')" id="tab-read"
                    class="tab-btn px-8 py-2.5 rounded-full text-[10px] font-sync uppercase tracking-widest text-gray-500 hover:text-white transition-all">
                    Read
                </button>
            </div>

            <!-- ✅ LOGOUT BUTTON (ONLY ADDITION) -->
            <button onclick="openLogoutModal()"
                class="flex items-center gap-2 px-5 py-2.5 rounded-full text-[10px] font-sync uppercase tracking-widest border border-red-500/30 text-red-400 hover:bg-red-500 hover:text-white transition-all">
                <i class="fa-solid fa-right-from-bracket"></i>
                Logout
            </button>
        </div>
    </div>

    <!-- TABLE -->
    <div class="glass rounded-3xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-white/5 text-gray-400 font-sync text-[9px] uppercase tracking-[0.2em] border-b border-white/10">
                    <tr>
                        <th class="p-6">#</th>
                        <th class="p-6">Client Name</th>
                        <th class="p-6">Email Address</th>
                        <th class="p-6 text-center">Action</th>
                    </tr>
                </thead>

                <tbody id="unread" class="tab-content divide-y divide-white/5">
                    @foreach($unread as $key => $inq)
                    <tr class="hover:bg-white/[0.02] transition-all group">
                        <td class="p-6 text-gray-500 font-mono text-xs">{{ $key+1 }}</td>
                        <td class="p-6">
                            <button onclick="openModal('{{ $inq->name }}','{{ $inq->phone }}','{{ $inq->email }}','{{ $inq->message }}')"
                                    class="text-white font-semibold hover:text-[#FF6B00] transition-colors flex items-center gap-2">
                                <i class="fa-solid fa-circle-user text-[#FF6B00]/50 group-hover:text-[#FF6B00]"></i>
                                {{ $inq->name }}
                            </button>
                        </td>
                        <td class="p-6 text-gray-400 text-sm italic">{{ $inq->email }}</td>
                        <td class="p-6 text-center">
                            <form method="POST" action="{{ route('inquiry.toggle', $inq->id) }}">
                                @csrf
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" onchange="this.form.submit()" class="sr-only peer">
                                    <div class="w-11 h-6 bg-white/10 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:h-5 after:w-5 after:rounded-full after:transition-all peer-checked:bg-[#FF6B00]"></div>
                                </label>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tbody id="read" class="tab-content hidden divide-y divide-white/5">
                    @foreach($read as $key => $inq)
                    <tr class="bg-white/[0.01] hover:bg-white/[0.03] transition-all opacity-70 hover:opacity-100">
                        <td class="p-6 text-gray-600 font-mono text-xs">{{ $key+1 }}</td>
                        <td class="p-6">
                            <button onclick="openModal('{{ $inq->name }}','{{ $inq->phone }}','{{ $inq->email }}','{{ $inq->message }}')"
                                    class="text-gray-300 hover:text-white transition-colors">
                                {{ $inq->name }}
                            </button>
                        </td>
                        <td class="p-6 text-gray-500 text-sm italic">{{ $inq->email }}</td>
                        <td class="p-6 text-center">
                            <form method="POST" action="{{ route('inquiry.toggle', $inq->id) }}">
                                @csrf
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked onchange="this.form.submit()" class="sr-only peer">
                                    <div class="w-11 h-6 bg-[#FF6B00] rounded-full peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:h-5 after:w-5 after:rounded-full after:transition-all"></div>
                                </label>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ✅ MODAL (UNCHANGED EXACTLY AS YOU GAVE) -->
<div id="modal" class="fixed inset-0 bg-black/90 hidden items-center justify-center z-50 p-4 backdrop-blur-sm">
    <div class="glass rounded-[2rem] p-8 w-full max-w-lg border border-white/20 shadow-[0_0_50px_rgba(0,0,0,0.5)]">
        <div class="flex justify-between items-center mb-8">
            <h2 class="font-sync text-lg font-bold text-[#FF6B00] tracking-tighter uppercase">Inquiry Details</h2>
            <button onclick="closeModal()" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:text-white hover:bg-red-500/20 transition-all">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="space-y-6">
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white/5 p-4 rounded-2xl border border-white/5">
                    <span class="block text-[8px] font-sync text-gray-500 uppercase tracking-widest mb-1">Client Name</span>
                    <p id="m_name" class="font-semibold text-white"></p>
                </div>
                <div class="bg-white/5 p-4 rounded-2xl border border-white/5">
                    <span class="block text-[8px] font-sync text-gray-500 uppercase tracking-widest mb-1">Contact No.</span>
                    <p id="m_phone" class="font-semibold text-white"></p>
                </div>
            </div>

            <div class="bg-white/5 p-4 rounded-2xl border border-white/5">
                <span class="block text-[8px] font-sync text-gray-500 uppercase tracking-widest mb-1">Email ID</span>
                <p id="m_email" class="text-orange-400 underline"></p>
            </div>

            <div class="bg-white/5 p-6 rounded-2xl border border-white/5">
                <span class="block text-[8px] font-sync text-gray-500 uppercase tracking-widest mb-2">Message</span>
                <p id="m_message" class="text-gray-300 leading-relaxed text-sm italic"></p>
            </div>
        </div>
        
        <button onclick="closeModal()" class="w-full mt-8 py-4 rounded-xl bg-white/5 border border-white/10 font-sync text-[10px] tracking-widest uppercase hover:bg-white hover:text-black transition-all">
            Close Panel
        </button>
    </div>
</div>
<div id="logoutModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50 backdrop-blur-sm">

    <div class="glass rounded-[2rem] p-8 w-full max-w-sm border border-white/20 shadow-[0_0_50px_rgba(0,0,0,0.5)] text-center">

        <div class="mb-6">
            <div class="w-16 h-16 mx-auto rounded-full bg-red-500/10 flex items-center justify-center mb-4">
                <i class="fa-solid fa-right-from-bracket text-red-400 text-xl"></i>
            </div>

            <h2 class="font-sync text-lg text-white uppercase tracking-widest">
                Confirm Logout
            </h2>

            <p class="text-gray-400 text-sm mt-2">
                Are you sure you want to logout?
            </p>
        </div>

        <!-- Buttons -->
        <div class="flex gap-4">
            <button onclick="closeLogoutModal()"
                class="w-full py-3 rounded-xl bg-white/5 border border-white/10 text-gray-300 text-[10px] font-sync uppercase tracking-widest hover:bg-white hover:text-black transition-all">
                Cancel
            </button>

            <!-- REAL LOGOUT FORM -->
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit"
                    class="w-full py-3 rounded-xl bg-red-500 text-white text-[10px] font-sync uppercase tracking-widest hover:bg-red-600 transition-all">
                    Logout
                </button>
            </form>
        </div>

    </div>
</div>
<script>
function showTab(tab) {
    document.getElementById('unread').classList.add('hidden');
    document.getElementById('read').classList.add('hidden');
    document.getElementById(tab).classList.remove('hidden');

    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active-tab');
        btn.classList.add('text-gray-500');
    });


    document.getElementById('tab-' + tab).classList.add('active-tab');
    document.getElementById('tab-' + tab).classList.remove('text-gray-500');
}

function openModal(name, phone, email, message) {
    document.getElementById('m_name').innerText = name;
    document.getElementById('m_phone').innerText = phone;
    document.getElementById('m_email').innerText = email;
    document.getElementById('m_message').innerText = message;

    document.getElementById('modal').classList.remove('hidden');
    document.getElementById('modal').classList.add('flex');
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}

function openLogoutModal() {
    document.getElementById('logoutModal').classList.remove('hidden');
    document.getElementById('logoutModal').classList.add('flex');
}

function closeLogoutModal() {
    document.getElementById('logoutModal').classList.add('hidden');
}
</script>

</body>
</html>