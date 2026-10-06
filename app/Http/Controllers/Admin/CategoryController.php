<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'image_url' => 'nullable|string',
        ]);
        
        $slug = Str::slug($data['name']);
        
        // Ensure unique slug
        $count = Category::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }
        
        $categoryData = [
            'name' => $data['name'],
            'slug' => $slug,
            'description' => $data['description'] ?? null,
            'is_active' => $request->has('is_active'),
        ];
        
        if ($request->hasFile('image')) {
            $categoryData['image'] = '/storage/' . $request->file('image')->store('categories', 'public');
        } elseif (!empty($data['image_url'])) {
            $categoryData['image'] = $data['image_url'];
        }
        
        Category::create($categoryData);
        return back()->with('success', 'Thêm danh mục thành công!');
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'image_url' => 'nullable|string',
        ]);
        
        $categoryData = [
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'is_active' => $request->has('is_active'),
        ];
        
        // Update slug if name changes
        if ($category->name !== $data['name']) {
            $slug = Str::slug($data['name']);
            $count = Category::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $category->id)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }
            $categoryData['slug'] = $slug;
        }
        
        if ($request->hasFile('image')) {
            $categoryData['image'] = '/storage/' . $request->file('image')->store('categories', 'public');
        } elseif (!empty($data['image_url'])) {
            $categoryData['image'] = $data['image_url'];
        }
        
        $category->update($categoryData);
        return back()->with('success', 'Cập nhật danh mục thành công!');
    }

    public function destroy(Category $category)
    {
        if ($category->products()->count() > 0) {
            return back()->with('error', 'Không thể xóa danh mục đang có sản phẩm. Vui lòng xóa sản phẩm trước!');
        }
        
        $category->delete();
        return back()->with('success', 'Xóa danh mục thành công!');
    }
}
