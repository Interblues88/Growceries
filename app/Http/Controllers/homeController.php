<?php

namespace App\Http\Controllers;

// use App\Models\customer;

use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index(){
        $products = Product::with('productDetail')->take(8)->get();

        $user = Auth::user();

        $userId = auth()?->user()?->id;

        $count = 0;

        $cartItems = collect();

        if (Auth::check()) {
            $userId = $user->id;

            // Ensure the user has a cart
            $cart = Cart::firstOrCreate(['userId' => $userId]);

            // Get the cart items
            $cartItems = $cart->cartList;

            // Count the cart items
            $count = $cartItems->count();
        }


        return view('home', compact('products', 'count', 'cartItems'));
    }
}
