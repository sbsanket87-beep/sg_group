<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    public function model(array $row)
    {
        // Skip header row
        if ($row[0] == 'name') return null;

        $imagePath = 'products/' . $row[2];
        $pdfPath = !empty($row[3]) ? 'products/' . $row[3] : null;

        return new Product([
            'name' => $row[0],
            'description' => $row[1],
            'image' => file_exists(storage_path('app/public/'.$imagePath)) ? $imagePath : null,
            'pdf' => $pdfPath && file_exists(storage_path('app/public/'.$pdfPath)) ? $pdfPath : null,
        ]);
    }
}