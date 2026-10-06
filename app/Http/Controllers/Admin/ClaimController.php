<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index()
    {
        $claims = Claim::with(['user', 'product'])->latest()->paginate(20);
        return view('admin.claims.index', compact('claims'));
    }

    public function update(Request $request, Claim $claim)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,resolved,rejected',
            'admin_notes' => 'nullable|string'
        ]);

        $claim->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes ?? $claim->admin_notes
        ]);

        return back()->with('success', 'Đã cập nhật trạng thái khiếu nại');
    }
}
