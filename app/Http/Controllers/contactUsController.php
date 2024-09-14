<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class contactUsController extends Controller
{

    public function contactUs()
    {
        return view('contactUs');
    }
    public function contactUs_r()
    {
        $response = Http::asForm()->post('https://formsubmit.co/jackyzhng2004@gmail.com', [
            'email' => request()->input('email'),
            'message' => request()->input('message'),
        ]);
        return redirect()->route('contactUs')->with('success', 'Form has been submitted successfully!');
    }
}
