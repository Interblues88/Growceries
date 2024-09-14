<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productController extends Controller
{
    public function productDetails($id){
        $product = product::where('productId', $id)->first();

        $user = Auth::user();

        $userId = auth()?->user()?->id;

        $cartItems = collect();

        if (Auth::check()) {
            $userId = $user->id;

            // Ensure the user has a cart
            $cart = cart::firstOrCreate(['userId' => $userId]);

            // Get the cart items
            $cartItems = $cart->cartList;

            // Count the cart items
            $count = $cartItems->count();
        }

        return view('productDetail', compact('product', 'cartItems'));
    }
}
