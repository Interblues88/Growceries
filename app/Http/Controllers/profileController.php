<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class profileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
    public function editPersonalData(Request $request)
    {
        $user = Auth::user();
        $editingPersonalData = true;
        return view('profile', compact('user', 'editingPersonalData'));
    }
    public function updatePicture(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;
        
        $validated = $request->validate([
            'image' => 'required|image|file|max:10240'
        ]);

        $user = user::where('id', $userId)->first();

        if($request->has('image')){
            $validated['image'] = $request->file('image')->store('users');
            if($user->image != null){
                Storage::disk('public')->delete($user->image);
            }
        }

        User::updateOrInsert(
            ['id' => $userId],
            ['image' => $validated['image']]
        );
        
        return redirect()->route('profile')->with('success', 'Succesfully change your profile picture');
    }
    public function updatePersonalData(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $nameReq = $request->input("name");
        $genderReq = $request->input("gender");
        $phoneReq = $request->input("phone");
        $emailReq = $request->input("email");

        User::updateOrInsert(
            ['id' => $userId],
            ['name' => $nameReq]
        );
        User::updateOrInsert(
            ['id' => $userId],
            ['gender' => $genderReq]
        );
        User::updateOrInsert(
            ['id' => $userId],
            ['phoneNumber' => $phoneReq]
        );
        User::updateOrInsert(
            ['id' => $userId],
            ['email' => $emailReq]
        );
        return redirect()->route('profile')->with('success', 'Succesfully change your personal data');
    }
}
