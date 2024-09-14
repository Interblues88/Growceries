<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function banUsers($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect(route('admin.users'))->with('success', 'User banned');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($request->has('search')) {
            $users = User::where('Id', 'LIKE', '%' . $search . '%')->get();
        } else {
            $users = User::all();
        }
        $searchResult = $users->first() ?: null;

        return view('admin.users.index', compact('users', 'searchResult', 'search'));
    }
}
