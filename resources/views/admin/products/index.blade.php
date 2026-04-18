<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products Panel</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<style>
@import url('https://fonts.googleapis.com/css2?family=Syncopate:wght@400;700&family=Inter:wght@300;400;600&display=swap');

body { font-family: 'Inter', sans-serif; background:#020202; }

.font-sync { font-family: 'Syncopate', sans-serif; }

.glass {
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.08);
}

input, textarea {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    color: white;
}

input::placeholder, textarea::placeholder {
    color: #888;
}
</style>
</head>

<body class="text-white p-6 lg:p-10">

<div class="max-w-7xl mx-auto">

<!-- HEADER -->
<div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-6">

    <div>
        <div class="flex items-center gap-3 mb-2">
            <div class="h-[2px] w-8 bg-[#FF6B00]"></div>
            <span class="text-[#FF6B00] font-sync text-[9px] tracking-[0.4em] uppercase">Admin Control</span>
        </div>
        <h1 class="text-3xl font-sync font-bold uppercase">
            Products <span class="text-transparent" style="-webkit-text-stroke:1px #fff;">Panel</span>
        </h1>
    </div>

    <div class="flex flex-wrap gap-3">

        <button onclick="openCreateModal()"
            class="px-6 py-3 bg-[#FF6B00] rounded-xl text-[10px] font-sync uppercase tracking-widest hover:bg-white hover:text-black transition">
            + Add Product
        </button>

        <button onclick="openBulkModal()"
            class="px-6 py-3 border border-white/20 rounded-xl text-[10px] font-sync uppercase tracking-widest hover:border-[#FF6B00] transition">
            Bulk Upload
        </button>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="px-6 py-3 border border-red-500/30 text-red-400 rounded-xl text-[10px] font-sync uppercase tracking-widest hover:bg-red-500 hover:text-white transition">
                Logout
            </button>
        </form>

    </div>
</div>

<!-- BULK DELETE -->
<form method="POST" action="{{ route('product.bulk.delete') }}">
@csrf

<div class="mb-6">
    <button class="px-5 py-3 bg-red-500 rounded-xl text-[10px] font-sync uppercase tracking-widest hover:bg-red-600 transition">
        Delete Selected
    </button>
</div>

<!-- TABLE -->
<div class="glass rounded-3xl overflow-hidden">
    <table class="w-full text-left">

        <thead class="bg-white/5 text-gray-400 font-sync text-[9px] uppercase tracking-widest">
            <tr>
                <th class="p-6"><input type="checkbox" onclick="toggleAll(this)"></th>
                <th class="p-6">Image</th>
                <th class="p-6">Name</th>
                <th class="p-6 text-center">Actions</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-white/5">
            @foreach($products as $product)
            <tr class="hover:bg-white/[0.02]">

                <td class="p-6">
                    <input type="checkbox" name="ids[]" value="{{ $product->id }}">
                </td>

                <td class="p-6">
                    <img src="{{ asset('storage/'.$product->image) }}" class="w-16 h-16 rounded object-cover">
                </td>

                <td class="p-6 font-semibold">{{ $product->name }}</td>

                <td class="p-6 text-center flex justify-center gap-3">

                    <button type="button"
                        onclick='openEditModal(@json($product))'
                        class="px-4 py-2 bg-blue-500 rounded-lg text-xs">
                        Edit
                    </button>

                    <form method="POST" action="{{ route('product.delete', $product->id) }}">
                        @csrf
                        <button class="px-4 py-2 bg-red-500 rounded-lg text-xs">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

</form>
</div>

<!-- CREATE MODAL -->
<div id="createModal" class="hidden fixed inset-0 bg-black/90 flex items-center justify-center">
<div class="glass p-8 rounded-3xl w-full max-w-lg">

<h2 class="font-sync mb-6 uppercase">Add Product</h2>

<form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
@csrf

<input type="text" name="name" placeholder="Product Name" class="w-full p-3 mb-4 rounded">
<textarea name="description" placeholder="Description" class="w-full p-3 mb-4 rounded"></textarea>

<input type="file" name="image" class="mb-4">
<input type="file" name="pdf" class="mb-4">

<button class="bg-[#FF6B00] px-5 py-3 rounded-xl text-xs uppercase">Save</button>
<button type="button" onclick="closeCreateModal()" class="ml-3 text-gray-400">Cancel</button>

</form>
</div>
</div>

<!-- BULK UPLOAD MODAL -->
<div id="bulkModal" class="hidden fixed inset-0 bg-black/90 flex items-center justify-center z-50">

    <div class="glass p-8 rounded-[2rem] w-full max-w-lg relative border border-white/10">

        <!-- CLOSE BUTTON -->
        <button onclick="closeBulkModal()" 
            class="absolute top-5 right-5 w-10 h-10 flex items-center justify-center rounded-full bg-white/5 hover:bg-red-500/20 transition">
            <i class="fa-solid fa-xmark text-gray-400 hover:text-white"></i>
        </button>

        <!-- HEADER -->
        <h2 class="font-sync mb-6 uppercase text-lg tracking-widest text-[#FF6B00]">
            Bulk Upload
        </h2>

        <!-- FORM -->
        <form method="POST" action="{{ route('product.import.csv') }}" enctype="multipart/form-data">
            @csrf

            <input type="file" name="file" class="mb-4 w-full p-3 rounded bg-white/5 border border-white/10">

            <p class="text-gray-400 text-xs mb-6 leading-relaxed">
                CSV Format:<br>
                name, description, image, pdf(optional)
            </p>

            <!-- ACTION BUTTONS -->
            <div class="flex gap-3">

                <button type="submit"
                    class="w-full bg-[#FF6B00] px-5 py-3 rounded-xl text-xs uppercase tracking-widest hover:bg-white hover:text-black transition">
                    Upload CSV
                </button>

                <a href="{{ route('product.sample.csv') }}"
                    class="w-full text-center border border-white/20 px-5 py-3 rounded-xl text-xs uppercase tracking-widest hover:border-[#FF6B00] transition">
                    Sample CSV
                </a>

            </div>
        </form>

    </div>
</div>

<!-- EDIT MODAL -->
<div id="editModal" class="hidden fixed inset-0 bg-black/90 flex items-center justify-center">
<div class="glass p-8 rounded-3xl w-full max-w-lg">

<h2 class="font-sync mb-6 uppercase">Edit Product</h2>

<form id="editForm" method="POST" enctype="multipart/form-data">
@csrf

<input id="editName" name="name" class="w-full p-3 mb-4 rounded">
<textarea id="editDesc" name="description" class="w-full p-3 mb-4 rounded"></textarea>

<input type="file" name="image" class="mb-4">
<input type="file" name="pdf" class="mb-4">

<button class="bg-blue-500 px-5 py-3 rounded-xl text-xs uppercase">Update</button>

</form>
</div>
</div>

<script>
function toggleAll(source){
    document.querySelectorAll('input[name="ids[]"]').forEach(cb => cb.checked = source.checked);
}

function openCreateModal(){ document.getElementById('createModal').classList.remove('hidden'); }
function closeCreateModal(){ document.getElementById('createModal').classList.add('hidden'); }

function openBulkModal(){ document.getElementById('bulkModal').classList.remove('hidden'); }

function openEditModal(product){
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editName').value = product.name;
    document.getElementById('editDesc').value = product.description;
    document.getElementById('editForm').action = '/admin/products/update/'+product.id;
}

function closeBulkModal(){
    document.getElementById('bulkModal').classList.add('hidden');
}

// close on outside click
window.addEventListener('click', function(e){
    const modal = document.getElementById('bulkModal');
    if(e.target === modal){
        closeBulkModal();
    }
});
</script>
</body>
</html>