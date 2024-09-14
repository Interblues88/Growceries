<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();
        $userId = $user->id;
        $admin = User::find($userId);
        return view('admin.profile.profileAdmin', compact("admin"));
    }
}
