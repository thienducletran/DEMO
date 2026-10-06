<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        
        if ($request->hasFile('image')) {
            $data['image'] = '/storage/' . $request->file('image')->store('banners', 'public');
        } else {
            $data['image'] = $request->input('image_url') ?? null;
        }
        
        $data['is_active'] = $request->has('is_active') ? true : false;
        
        Banner::create($data);
        return back()->with('success', 'Thêm banner thành công!');
    }

    public function update(Request $request, Banner $banner)
    {
        $data = $request->except(['_token', '_method']);
        
        if ($request->hasFile('image')) {
            $data['image'] = '/storage/' . $request->file('image')->store('banners', 'public');
        } elseif ($request->input('image_url')) {
            $data['image'] = $request->input('image_url');
        }
        
        $data['is_active'] = $request->has('is_active') ? true : false;
        
        $banner->update($data);
        return back()->with('success', 'Cập nhật banner thành công!');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back()->with('success', 'Xóa banner thành công!');
    }
}
