<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    // 📋 LIST SERVICES
    public function index()
    {
        $services = Service::latest()->paginate(9); // pagination
        return view('services.index', compact('services'));
    }

    public function adminIndex()
    {
        $services = Service::latest()->paginate(9); // pagination
        return view('admin/services.index', compact('services'));
    }
    

    // ➕ STORE SERVICE (CREATE)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'gallery.*' => 'image'
        ]);

        // ✅ Upload main image
        $mainImage = $request->file('image')->store('services', 'public');

        // ✅ Create service
        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $mainImage,
        ]);

        // ✅ Save gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $path = $img->store('services/gallery', 'public');

                $service->images()->create([
                    'image' => $path
                ]);
            }
        }

        return back()->with('success', 'Service added successfully');
    }

    // 👁️ SHOW SERVICE (WITH GALLERY)
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }

    // ✏️ UPDATE SERVICE
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image',
            'gallery.*' => 'image'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        // ✅ Replace main image
        if ($request->hasFile('image')) {

            // delete old image
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

         // ❌ Remove old gallery images first
         if ($service->images()->count()) {

            foreach ($service->images as $img) {

                // delete file from storage
                if (\Storage::disk('public')->exists($img->image)) {
                    \Storage::disk('public')->delete($img->image);
                }

                // delete record from DB
                $img->delete();
            }
        }

        // ✅ Add new gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {

                $path = $img->store('services/gallery', 'public');

                $service->images()->create([
                    'image' => $path
                ]);
            }
        }

        return back()->with('success', 'Service updated successfully');
    }

    // ❌ DELETE SERVICE (with all images)
    public function destroy(Service $service)
    {
        // delete main image
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        // delete gallery images
        foreach ($service->images as $img) {
            if (Storage::disk('public')->exists($img->image)) {
                Storage::disk('public')->delete($img->image);
            }
        }

        $service->delete();

        return back()->with('success', 'Service deleted successfully');
    }
}