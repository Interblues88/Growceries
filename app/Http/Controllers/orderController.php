<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartList;
use App\Models\order;
use App\Models\orderList;
use App\Models\product;
use App\Models\Refund;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index($category = "Current")
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You are not logged in.');
        }

        $orders = Order::where('userId', Auth::id())->get();

        return view('order', compact('orders', 'category'));
    }

    public function detail($id){
        $order = Order::where('orderId', $id)->first();
        $orderDetail = orderList::where('orderId', $id)->get();
        $totalPrice = 0;

        foreach ($orderDetail as $item) {
            $priceperUnit = $item->product->productPrice * $item->quantity;
            $totalPrice += $priceperUnit;
        }
        return view('orderDetail', compact('order', 'orderDetail', 'totalPrice'));
    }

    public function delete($id){
        $order = Order::find($id);
        $orderDetail = orderList::where('orderId', $order->orderId)->get();
        $order->delete();

        foreach ($orderDetail as $value) {
            $product = product::where('productId', $value->productId)->first();
            $product->stock += $value->quantity;
            $product->save();
        }
       
        return redirect()->route('order');
    }

    public function refund($id){
        $order = order::where('orderId', $id)->first();
        $detail = orderList::where('orderId', $id)->get();

        return view('refund', compact('detail', 'order'));
    }

    public function storerefund(Request $request, $id){

        $order = order::where('orderId', $id)->first();

        $validated = $request->validate([
            'reason' => 'required|max:255',
            'image' => 'required|image|file|max:1024'
        ]);

        if($request->file('image')){
            $validated['image'] = $request->file('image')->store('users');
        }


        Refund::create([
            'orderId' => $order->orderId,
            'content' => $validated['reason'],
            'image' => $validated['image'],
        ]);

        $order->orderStatus = 'Request Refund';
        $order->save();

        return redirect()->route('home')->with('success', 'Order has been Requested to be Refund!');
    }

}
