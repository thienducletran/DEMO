<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:customer,manager,admin'
        ]);

        $user->update(['role' => $request->role]);
        return back()->with('success', 'Đã cập nhật quyền người dùng');
    }
}
