<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function menu()
    {
        return view('qc.menu');
    }

    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'NAME' => 'required|string|max:255',
            'TYPE' => 'nullable|string|max:255',
            'KATEGORI' => 'nullable|string|max:255',
            'SIZE_LENGTH' => 'nullable|string|min:0',
            'SIZE_WIDTH' => 'nullable|string|min:0',
            'SIZE_HEIGHT' => 'nullable|string|min:0',
            'ISI' => 'nullable|string|max:255',
            'SATUAN' => 'nullable|string|max:255',
            'HARGA' => 'nullable|numeric',
            'BOM' => 'nullable|string|max:255',
            'MESIN' => 'nullable|string|max:255',
            'WARNA' => 'nullable|string|max:255',
        ]);

        // Gabungkan ukuran menjadi satu string
        $size = null;
        if ($request->filled(['SIZE_LENGTH', 'SIZE_WIDTH', 'SIZE_HEIGHT'])) {
            $size = $validated['SIZE_LENGTH'] . ' x ' . $validated['SIZE_WIDTH'] . ' x ' . $validated['SIZE_HEIGHT'];
        }

        $validated['SIZE'] = $size;
        $validated['STATUS'] = 'ACTIVE';
        $validated['CREATED_DATE'] = now();
        $validated['CREATED_BY'] = Auth::user()->name;

        // Simpan ke database
        Product::create([
            'NAME' => $validated['NAME'],
            'TYPE' => $validated['TYPE'],
            'KATEGORI' => $validated['KATEGORI'],
            'SIZE' => $validated['SIZE'],
            'ISI' => $validated['ISI'],
            'SATUAN' => $validated['SATUAN'],
            'HARGA' => $validated['HARGA'],
            'BOM' => $validated['BOM'],
            'MESIN' => $validated['MESIN'],
            'WARNA' => $validated['WARNA'],
            'STATUS' => $validated['STATUS'] ?? 'ACTIVE',
            'CREATED_DATE' => $validated['CREATED_DATE'],
            'CREATED_BY' => $validated['CREATED_BY'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        if ($product->SIZE) {
            $size = explode('x', $product->SIZE);
            $product->SIZE_LENGTH = $size[0] ?? '';
            $product->SIZE_WIDTH = $size[1] ?? '';
            $product->SIZE_HEIGHT = $size[2] ?? '';
        }

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'NAME' => 'required|string|max:255',
            'TYPE' => 'nullable|string|max:255',
            'KATEGORI' => 'nullable|string|max:255',
            'SIZE_LENGTH' => 'nullable|numeric|min:0',
            'SIZE_WIDTH' => 'nullable|numeric|min:0',
            'SIZE_HEIGHT' => 'nullable|numeric|min:0',
            'ISI' => 'nullable|string|max:255',
            'SATUAN' => 'nullable|string|max:255',
            'HARGA' => 'nullable|numeric',
            'BOM' => 'nullable|string|max:255',
            'MESIN' => 'nullable|string|max:255',
            'WARNA' => 'nullable|string|max:255',
        ]);

        // Gabungkan ukuran menjadi satu string (SIZE)
        $size = null;
        if ($request->filled(['SIZE_LENGTH', 'SIZE_WIDTH', 'SIZE_HEIGHT'])) {
            $size = $validated['SIZE_LENGTH'] . ' x ' . $validated['SIZE_WIDTH'] . ' x ' . $validated['SIZE_HEIGHT'];
        }

        // Update kolom SIZE dengan nilai gabungan
        $validated['SIZE'] = $size;

        // Hanya sertakan kolom yang benar-benar akan diupdate
        $updateData = [
            'NAME' => $validated['NAME'],
            'TYPE' => $validated['TYPE'],
            'KATEGORI' => $validated['KATEGORI'],
            'SIZE' => $validated['SIZE'],
            'ISI' => $validated['ISI'],
            'SATUAN' => $validated['SATUAN'],
            'HARGA' => $validated['HARGA'],
            'BOM' => $validated['BOM'],
            'MESIN' => $validated['MESIN'],
            'WARNA' => $validated['WARNA'],
        ];

        // Perbarui produk dengan data yang valid
        $product->update($updateData);

        // Redirect dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
