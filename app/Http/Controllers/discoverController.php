<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use App\Models\productDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class discoverController extends Controller
{
    public function index()
    {
        $products = product::all();
        $products_all = product::all();
        $productDetail = productDetail::all();
        $productsQuery = Product::query();
        $user = Auth::user();
        $userId = auth()?->user()?->id;

        $count = 0;

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




        $isSayurSelected = filter_var(request()->input('sayur'), FILTER_VALIDATE_BOOLEAN);
        $isBuahSelected = filter_var(request()->input('buah'), FILTER_VALIDATE_BOOLEAN);

        if ($isSayurSelected && $isBuahSelected) {
            // Jika keduanya dipilih, tampilkan kedua kategori
            $productsQuery->whereHas('productDetail', function ($query) {
                $query->whereIn('productCategory', ['Vegetable', 'Fruit']);
            });
        } elseif ($isSayurSelected) {
            // Jika hanya sayur yang dipilih
            $productsQuery->whereHas('productDetail', function ($query) {
                $query->where('productCategory', 'Vegetable');
            });
        } elseif ($isBuahSelected) {
            // Jika hanya buah yang dipilih
            $productsQuery->whereHas('productDetail', function ($query) {
                $query->where('productCategory', 'Fruit');
            });
        }

        if (request()->has('minPrice') || request()->has('maxPrice')) {
            $minPrice = request()->input('minPrice');
            $maxPrice = request()->input('maxPrice');
            $productsQuery->whereBetween('productPrice', [$minPrice, $maxPrice]);
        }


        // Price Range Filter
        // if (request()->has('minPrice') && request()->has('maxPrice')) {
        //     $minPrice = request()->input('minPrice');
        //     $maxPrice = request()->input('maxPrice');
        //     $productsQuery->whereBetween('price', [$minPrice, $maxPrice]);
        // }

        // Execute the quer y to get the results
        if ($searchInput = request()->input('search_Input')) {
            $productsQuery->whereHas('productDetail', function ($query) use ($searchInput) {
                $query->where('productName', 'like', '%' . $searchInput . '%');
            });
        }
        $products = $productsQuery->get();

        return view('discover', compact('products', 'count', 'cartItems', 'productDetail', 'products_all'));
        return view('discover', [
            'products' => $products,
            'products_all' => $products_all,
            'productDetail' => $productDetail

        ]);
    }
}
