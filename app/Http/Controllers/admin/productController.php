<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\productDetail;
use App\Models\User;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $products = product::all();
        // dump($products);
        return view('admin.products.crud', compact('products'));
    }

    public function addProduct()
    {
        return view('admin.products.addProduct');
    }

    public function show(product $product){
        return view('admin.products.showProduct', compact('product'));
    }

    public function store()
    {
        // $validator = request()->validate([
        //     'productName' => 'required',
        //     'productPrice' => 'required|numeric',
        //     'stock' => 'required|numeric',
        //     'variant' => 'required',
        //     'calories' => 'required|numeric',
        //     'fat' => 'required|numeric',
        //     'sugar' => 'required|numeric',
        //     'carbohydrate' => 'required|numeric',
        //     'protein' => 'required|numeric',
        //     'shelfLife' => 'required',
        //     'productCategory' => 'required',
        //     'productDesc' => 'required',
        //     'origin' => 'required'
        // ]);

        // First, check if a product detail with the same name already exists
        $productDetail = productDetail::where('productName', request()->get('productName'))->first();
        if (!$productDetail) {
            // If product detail doesn't exist, create a new one
            $productDetail = ProductDetail::create([
                'productName' => request()->get('productName', ''), // Assuming the input for the product name is 'product_name'
                'calories' => request()->get('calories', null), // Assuming the input for calories
                'fat' => request()->get('fat', null), // Assuming the input for fat
                'sugar' => request()->get('sugar', null), // Assuming the input for sugar
                'carbohydrate' => request()->get('carbohydrate', null), // Assuming the input for carbohydrate
                'protein' => request()->get('protein', null), // Assuming the input for protein
                'shelfLife' => request()->get('shelfLife', null), // Assuming the input for shelf life
                'productCategory' => request()->get('productCategory', null), // Assuming the input for shelf life
                'productDesc' => request()->get('productDesc', null), // Assuming the input for shelf life
                'origin' => request()->get('origin', null),
            ]);

            // Save the product detail
            $productDetail->save();
        }

        // Create a new product with the provided variant and link it to the product detail
        $product = product::create([
            'productDetailId' => $productDetail->productDetailId,
            'productName' => request()->get('productName', ''), // Assuming the input for the product name is 'product_name'
            'productPrice' => request()->get('productPrice', ''), // Assuming the input for the variant is 'product'
            'stock' => request()->get('stock', ''), // Assuming the input for the variant is 'product'
            'variant' => request()->get('variant', ''), // Assuming the input for the variant is 'product'
            'image' => 'image/productImage/'.request()->get('image', '')
        ]);

        $product->save();

        return redirect()->route('admin.products');

    }

    public function destroy(product $product){
       $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
    }

    public function edit(product $product){
        $editing = true;
        return view('admin.products.editProduct', compact('product', 'editing'));
    }

    public function update(product $product){
        if($product->productName != null){$product->productDetail->productName = request()->productName;}
        if($product->productName != null){$product->productName = request()->productName;}
        if($product->calories != null){$product->productDetail->calories = request()->calories;}
        if($product->fat != null){$product->productDetail->fat = request()->fat;}
        if($product->sugar != null){$product->productDetail->sugar = request()->sugar;}
        if($product->carbohydrate != null){$product->productDetail->carbohydrate = request()->carbohydrate;}
        if($product->protein != null){$product->productDetail->protein = request()->protein;}
        if($product->shelfLife != null){$product->productDetail->shelfLife = request()->shelfLife;}
        if($product->productCategory != null){$product->productDetail->productCategory = request()->productCategory;}
        if($product->productDesc != null){$product->productDetail->productDesc = request()->productDesc;}
        if($product->origin != null){$product->productDetail->origin = request()->origin;}
        if($product->productPrice != null){$product->productPrice = request()->productPrice;}
        if($product->stock != null){$product->stock = request()->stock;}
        if($product->variant != null){$product->variant = request()->variant;}
        if($product->image != null){$product->image = 'image/productImage/'.request()->image;}

        $product->productDetail->save();
        $product->save();

        return redirect()->route('admin.products', $product)->with('success', 'Product updated successfully!');
    }

    public function search(Request $request){

        $search = $request->input('search');

        if ($request->has('search')) {
            $products = product::where('productId', 'LIKE', $request->search)->get();
        }
        else{
            $products = product::all(); 
        }
        $searchResult = $products->first() ?: null; // Assuming only one result for simplicity

        // dd($searchResult && $searchResult->productStatus == 'Done');

        return view('admin.products.crud', compact('products', 'searchResult', 'search'));
    }

}
