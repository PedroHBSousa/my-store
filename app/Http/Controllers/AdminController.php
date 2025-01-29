<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function edit(Product $product)
    {
        return view('admin.product_edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'string|required',
            'cover' => 'file|nullable',
            'price' => 'string|required',
            'description' => 'string|nullable',
            'stock' => 'integer|nullable'
        ]);

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            Storage::disk('public')->delete($product->cover ?? '');
            $validated['cover'] = $request->file('cover')->store('products', 'public');

            // or

            // $file = $validated['cover'];
            // $path = $file->store('products', 'public');
            // $input['cover'] = $path;
        }

        $product->fill($validated);
        $product->save();

        return redirect()->route('admin.products.index');
    }

    public function create()
    {
        return view('admin.product_create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string|required',
            'cover' => 'file|required',
            'price' => 'string|required',
            'description' => 'string|nullable',
            'stock' => 'integer|nullable'
        ]);
        $validated['slug'] = Str::slug($validated['name']);
        $validated['cover'] = $request->file('cover')->store('products', 'public');

        Product::create($validated);

        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        Storage::disk('public')->delete($product->cover);
        return redirect()->route('admin.products.index');
    }

    public function destroyImage(Product $product)
    {
        Storage::disk('public')->delete($product->cover);
        $product->cover = null;
        $product->save();
        return redirect()->back();
    }
}
