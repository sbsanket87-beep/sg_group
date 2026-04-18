<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        $products = Product::latest()->paginate(9); // for "See All" page
        return view('products.index', compact('products'));
    }

    // Show single product page
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Store product (Admin)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'pdf' => 'nullable|mimes:pdf'
        ]);

        // Upload files
        $imagePath = $request->file('image')->store('products', 'public');
        $pdfPath = $request->file('pdf') 
            ? $request->file('pdf')->store('products', 'public') 
            : null;

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'pdf' => $pdfPath,
        ]);

        return back()->with('success', 'Product added!');
    }

    public function adminIndex()
{
    $products = Product::latest()->get();
    return view('admin.products.index', compact('products'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    if($request->file('image')){
        $product->image = $request->file('image')->store('products','public');
    }

    if($request->file('pdf')){
        $product->pdf = $request->file('pdf')->store('products','public');
    }

    $product->update([
        'name' => $request->name,
        'description' => $request->description
    ]);

    return back();
}

public function destroy($id)
{
    Product::findOrFail($id)->delete();
    return back();
}

public function bulkDelete(Request $request)
{
    Product::whereIn('id', $request->ids)->delete();
    return back();
}
public function bulkStore(Request $request)
{
    foreach($request->file('images') as $image){
        $path = $image->store('products','public');

        Product::create([
            'name' => 'Product '.rand(100,999),
            'description' => 'Bulk uploaded product',
            'image' => $path
        ]);
    }

    return back();
}

public function importCSV(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:csv,txt'
    ]);

    $file = fopen($request->file('file'), 'r');

    $header = fgetcsv($file); // skip header

    while (($row = fgetcsv($file)) !== false) {

        $imagePath = 'products/' . $row[2];
        $pdfPath = !empty($row[3]) ? 'products/' . $row[3] : null;

        \App\Models\Product::create([
            'name' => $row[0],
            'description' => $row[1],
            'image' => file_exists(storage_path('app/public/'.$imagePath)) ? $imagePath : null,
            'pdf' => $pdfPath && file_exists(storage_path('app/public/'.$pdfPath)) ? $pdfPath : null,
        ]);
    }

    fclose($file);

    return back()->with('success', 'CSV Imported Successfully!');
}
}
