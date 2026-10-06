<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'store'])->latest()->get();
        $categories = Category::all();
        $stores = Store::all();
        return view('admin.products.index', compact('products', 'categories', 'stores'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:50|unique:products,sku',
            'category_id' => 'required|exists:categories,id',
            'store_id' => 'nullable|exists:stores,id',
            'brand' => 'nullable|string|max:100',
            'import_price' => 'nullable|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'image_url' => 'nullable|string',
        ]);
        
        $slug = Str::slug($data['name']);
        
        // Ensure unique slug
        $count = Product::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }
        
        $productData = [
            'name' => $data['name'],
            'slug' => $slug,
            'sku' => $data['sku'] ?? null,
            'category_id' => $data['category_id'],
            'store_id' => $data['store_id'] ?? null,
            'brand' => $data['brand'] ?? null,
            'import_price' => $data['import_price'] ?? null,
            'price' => $data['price'],
            'old_price' => $data['old_price'] ?? null,
            'stock' => $data['stock'],
            'description' => $data['description'] ?? null,
            'is_active' => $request->has('is_active'),
        ];
        
        if ($request->hasFile('image')) {
            $productData['image'] = '/storage/' . $request->file('image')->store('products', 'public');
        } elseif (!empty($data['image_url'])) {
            $productData['image'] = $data['image_url'];
        } else {
            $productData['image'] = 'https://via.placeholder.com/150';
        }
        
        Product::create($productData);
        return back()->with('success', 'Thêm sản phẩm thành công!');
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:50|unique:products,sku,' . $product->id,
            'category_id' => 'required|exists:categories,id',
            'store_id' => 'nullable|exists:stores,id',
            'brand' => 'nullable|string|max:100',
            'import_price' => 'nullable|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'old_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'image_url' => 'nullable|string',
        ]);
        
        $productData = [
            'name' => $data['name'],
            'sku' => $data['sku'] ?? null,
            'category_id' => $data['category_id'],
            'store_id' => $data['store_id'] ?? null,
            'brand' => $data['brand'] ?? null,
            'import_price' => $data['import_price'] ?? null,
            'price' => $data['price'],
            'old_price' => $data['old_price'] ?? null,
            'stock' => $data['stock'],
            'description' => $data['description'] ?? null,
            'is_active' => $request->has('is_active'),
        ];
        
        // Update slug if name changes
        if ($product->name !== $data['name']) {
            $slug = Str::slug($data['name']);
            $count = Product::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $product->id)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }
            $productData['slug'] = $slug;
        }
        
        if ($request->hasFile('image')) {
            $productData['image'] = '/storage/' . $request->file('image')->store('products', 'public');
        } elseif (!empty($data['image_url'])) {
            $productData['image'] = $data['image_url'];
        }
        
        $product->update($productData);
        return back()->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy(Product $product)
    {
        // Could check for orders before deleting
        $product->delete();
        return back()->with('success', 'Xóa sản phẩm thành công!');
    }
}
