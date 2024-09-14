<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\orderList;
use App\Models\Refund;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = order::orderBy('orderId', 'DESC')->get();
        $searchResult = null;
        return view('admin.order.index', compact('orders', 'searchResult'));
    }

    public function detail($orderId){
        $order = order::where('orderId', $orderId)->first();
        $detail = orderList::where('orderId', $orderId)->get();
        return view('admin.order.detail', compact('detail', 'order'));
    }

    public function search(Request $request){

        $search = $request->input('search');

        if ($request->has('search')) {
            $orders = order::where('orderId', 'LIKE', $request->search)->get();
        }
        else{
            $orders = order::all();
        }
        $searchResult = $orders->first() ?: null; // Assuming only one result for simplicity

        // dd($searchResult && $searchResult->orderStatus == 'Done');

        return view('admin.order.index', compact('orders', 'searchResult', 'search'));
    }

    public function accRefund($id){
        $order = order::where('orderId', $id)->first();

        $order->orderStatus = 'Refunded';
        $order->save();
        
        $refund = Refund::where('orderId', $id)->first();
        $refund->refundedtime = Carbon::now();
        $refund->save();

        return redirect()->route('admin.home');

    }

    public function rejRefund($id){
        $order = order::where('orderId', $id)->first();

        $order->orderStatus = 'Rejected';
        $order->save();

        $refund = Refund::where('orderId', $id)->first();
        $refund->refundedtime = Carbon::now();
        $refund->save();

        return redirect()->route('admin.home');

    }

}
