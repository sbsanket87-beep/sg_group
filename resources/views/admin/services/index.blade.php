<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Services Panel</title>

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
<div class="flex justify-between items-center mb-10">
    <h1 class="text-3xl font-sync font-bold uppercase">
        Services Panel
    </h1>

    <button onclick="openCreateModal()"
        class="px-6 py-3 bg-[#FF6B00] rounded-xl text-[10px] font-sync uppercase tracking-widest hover:bg-white hover:text-black transition">
        + Add Service
    </button>
</div>

<!-- TABLE -->
<div class="glass rounded-3xl overflow-hidden">
<table class="w-full text-left">

<thead class="bg-white/5 text-gray-400 font-sync text-[9px] uppercase">
<tr>
    <th class="p-6">Image</th>
    <th class="p-6">Name</th>
    <th class="p-6">Description</th>
    <th class="p-6 text-center">Actions</th>
</tr>
</thead>

<tbody class="divide-y divide-white/5">
@foreach($services as $service)
<tr class="hover:bg-white/[0.02]">

<td class="p-6">
    <img src="{{ asset('storage/'.$service->image) }}" class="w-16 h-16 rounded object-cover">
</td>

<td class="p-6 font-semibold">{{ $service->name }}</td>

<td class="p-6 text-gray-400 text-sm">
    {{ \Illuminate\Support\Str::limit($service->description, 50) }}
</td>

<td class="p-6 flex justify-center gap-3">

<a href="{{ route('services.show',$service->id) }}" 
   class="px-4 py-2 bg-green-500 rounded-lg text-xs">View</a>

<button onclick='openEditModal(@json($service))' 
    class="px-4 py-2 bg-blue-500 rounded-lg text-xs">Edit</button>

<form method="POST" action="{{ route('services.destroy',$service->id) }}">
@csrf
@method('DELETE')
<button class="px-4 py-2 bg-red-500 rounded-lg text-xs">Delete</button>
</form>

</td>

</tr>
@endforeach
</tbody>

</table>
</div>

</div>

<!-- CREATE MODAL -->
<div id="createModal" class="hidden fixed inset-0 bg-black/90 flex items-center justify-center z-50">
<div class="glass p-8 rounded-3xl w-full max-w-lg relative">

<!-- CLOSE BUTTON -->
<button onclick="closeCreateModal()" 
    class="absolute top-4 right-4 text-gray-400 hover:text-white">
    <i class="fa-solid fa-xmark"></i>
</button>

<h2 class="mb-6 font-sync uppercase">Add Service</h2>

<form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
@csrf

<input type="text" name="name" placeholder="Service Name" class="w-full p-3 mb-4 rounded">

<textarea name="description" placeholder="Description" class="w-full p-3 mb-4 rounded"></textarea>

<label class="text-xs text-gray-400">Main Image</label>
<input type="file" name="image" class="mb-4 w-full">

<label class="text-xs text-gray-400">Gallery Images</label>
<input type="file" name="gallery[]" multiple class="mb-4 w-full">

<div class="flex gap-3">
<button class="bg-[#FF6B00] px-5 py-3 rounded-xl text-xs uppercase">Save</button>
<button type="button" onclick="closeCreateModal()" class="text-gray-400">Cancel</button>
</div>

</form>

</div>
</div>

<!-- EDIT MODAL -->
<div id="editModal" class="hidden fixed inset-0 bg-black/90 flex items-center justify-center z-50">
<div class="glass p-8 rounded-3xl w-full max-w-lg relative">

<!-- CLOSE BUTTON -->
<button onclick="closeEditModal()" 
    class="absolute top-4 right-4 text-gray-400 hover:text-white">
    <i class="fa-solid fa-xmark"></i>
</button>

<h2 class="mb-6 font-sync uppercase">Edit Service</h2>

<form id="editForm" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<input id="editName" name="name" class="w-full p-3 mb-4 rounded">

<textarea id="editDesc" name="description" class="w-full p-3 mb-4 rounded"></textarea>

<label class="text-xs text-gray-400">Replace Main Image</label>
<input type="file" name="image" class="mb-4">

<label class="text-xs text-gray-400">Add More Gallery Images</label>
<input type="file" name="gallery[]" multiple class="mb-4">

<div class="flex gap-3">
<button class="bg-blue-500 px-5 py-3 rounded-xl text-xs uppercase">Update</button>
<button type="button" onclick="closeEditModal()" class="text-gray-400">Cancel</button>
</div>

</form>

</div>
</div>

<script>
function openCreateModal(){
    document.getElementById('createModal').classList.remove('hidden');
}

function closeCreateModal(){
    document.getElementById('createModal').classList.add('hidden');
}

function openEditModal(service){
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editName').value = service.name;
    document.getElementById('editDesc').value = service.description;
    document.getElementById('editForm').action = '/services/' + service.id;
}

function closeEditModal(){
    document.getElementById('editModal').classList.add('hidden');
}
</script>

</body>
</html>