<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::latest()->paginate(20);
        return view('admin.coupons.index', compact('coupons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:coupons',
            'type' => 'required|in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:1',
            'min_order_value' => 'nullable|numeric|min:0',
            'expires_at' => 'nullable|date'
        ]);

        Coupon::create($request->all());
        return back()->with('success', 'Thêm mã giảm giá thành công');
    }

    public function update(Request $request, Coupon $coupon)
    {
        $coupon->update(['is_active' => $request->has('is_active') ? $request->is_active : $coupon->is_active]);
        return back()->with('success', 'Cập nhật mã giảm giá thành công');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return back()->with('success', 'Xóa mã giảm giá thành công');
    }
}
