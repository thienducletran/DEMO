<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('manager.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'image' => 'required|url',
        ]);

        $store = Auth::user()->store;
        
        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . time(),
            'category_id' => $request->category_id,
            'store_id' => $store->id,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'image' => $request->image,
            'rating' => 5.0,
            'reviews' => 0,
        ]);

        return redirect()->route('manager.dashboard')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function edit(Product $product)
    {
        $store = Auth::user()->store;
        if ($product->store_id != $store->id) {
            abort(403, 'Unauthorized action.');
        }
        $categories = Category::all();
        return view('manager.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $store = Auth::user()->store;
        if ($product->store_id != $store->id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'image' => 'required|url',
        ]);

        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . time(),
            'category_id' => $request->category_id,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'image' => $request->image,
        ]);

        return redirect()->route('manager.dashboard')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy(Product $product)
    {
        $store = Auth::user()->store;
        if ($product->store_id != $store->id) {
            abort(403, 'Unauthorized action.');
        }
        
        $product->delete();
        return redirect()->route('manager.dashboard')->with('success', 'Đã xóa sản phẩm!');
    }
}
