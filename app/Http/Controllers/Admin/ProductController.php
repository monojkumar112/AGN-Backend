<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::all();
        // $products->dd();
        return view('admin.products.index', compact('products')); // Backend product list view
    }

    public function create()
    {
        return view('admin.products.create-or-update'); // View to add a product
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'link' => ['required', 'regex:/^(https?:\/\/|#).*$/'],
            'app_status' => 'required|string'
        ]);

        // Handle image upload
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/frontend/img/products'), $imageName);

        // Save product to the database
        Product::create([
            'name' => $request->name,
            'image' => $imageName,
            'link' => $request->link,
            'app_status' => $request->app_status,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
    }

    public function edit(Product $product)
    {
        return view('admin.products.create-or-update', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'required|url',
            'app_status' => 'required|string'
        ]);

        if ($product->image) {
            $imagePath = public_path('assets/frontend/img/products/' . $product->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/frontend/img/products'), $imageName);
            $product->image = $imageName;
        }

        $product->update([
            'name' => $request->name,
            'link' => $request->link,
            'app_status' => $request->app_status,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Delete the product image if it exists
        if ($product->image) {
            $imagePath = public_path('assets/frontend/img/products/' . $product->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Delete the product from the database
        $product->delete();

        // Redirect with success message
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}
