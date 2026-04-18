@extends('layouts.app')

@section('title', 'Add Product | Admin Dashboard')

@section('content')
<div class="container mx-auto py-12 px-6 lg:px-20">
    <h1 class="text-3xl font-bold mb-6">Add New Product</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block mb-1 font-bold">Product Name</label>
            <input type="text" name="name" class="w-full border p-3 rounded" value="{{ old('name') }}" required>
        </div>

        <div>
            <label class="block mb-1 font-bold">Description</label>
            <textarea name="description" class="w-full border p-3 rounded" rows="5" required>{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block mb-1 font-bold">Image</label>
            <input type="file" name="image" accept="image/*" required>
        </div>

        <div>
            <label class="block mb-1 font-bold">PDF (Optional)</label>
            <input type="file" name="pdf" accept="application/pdf">
        </div>

        <div>
            <button type="submit" class="px-6 py-3 bg-orange-600 text-white rounded hover:bg-orange-700 transition">Add Product</button>
        </div>
    </form>
</div>
@endsection