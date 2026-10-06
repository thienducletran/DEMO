<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::with('user')->withCount('products')->latest()->paginate(20);
        return view('admin.stores.index', compact('stores'));
    }

    public function update(Request $request, Store $store)
    {
        $request->validate([
            'is_active' => 'required|boolean'
        ]);

        $store->update(['is_active' => $request->is_active]);
        return back()->with('success', 'Đã cập nhật trạng thái gian hàng');
    }
}
