<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\cart;
use App\Models\cartList;
use App\Models\order;
use App\Models\orderList;
use App\Models\product;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Stmt\Foreach_;

class checkOutController extends Controller
{
   public function addOrder(Request $request)
   {
      $user = Auth::user();
      $userId = $user->id;

      $orderRequest = $request->input("selectedItems");
      if (!Auth::check()) {
         return redirect()->route('login')->with('error', 'You are not logged in.');
      }

      $request->validate([
         'optionPayment' => 'required',
         'addressEmpty' => 'required'
      ]);

      $couriers = User::where('utype', "courier")->pluck('id')->toArray();
      // Check if there are couriers available

      // Select a random courier ID
      $randomCourierId = $couriers[array_rand($couriers)];

      $input = $request->input("deliveryTime");
      // Split the input string into date and time parts
      list($date, $month, $timeRange) = explode(' ', $input);
      $date = $date . ' ' . $month;
      // Extract the start time
      list($startTime, $endTime) = explode('-', $timeRange);
      // Concatenate date with start time
      $datetimeString = $date . ' ' . $startTime;
      // Convert the string into a DateTime object
      $datetime = DateTime::createFromFormat('d M H:i', $datetimeString);
      // Format the DateTime object into MySQL timestamp format
      $mysqlTimestamp = $datetime->format('Y-m-d H:i:s');

      $order = new order([
         'userId' => $userId,
         'courierId' => $randomCourierId,
         'created_at' => Carbon::now(),
         'updated_at' => Carbon::now(),
         'orderStatus' => "Packing",
         'deliveryTime' => $mysqlTimestamp,
         'payment' => $request->input('optionPayment'),
         'addressId' => $request->input("addressId")
      ]);
      $order->save();
      foreach ($orderRequest as $req) {
         $quant = User::join("cart", "cart.userId", "=", "users.id")
            ->join("cartList", "cartList.cartId", "=", "cart.cartId")
            ->select("cartList.quantity")
            ->where("users.id", $userId)
            ->where("cartList.productId", $req)
            ->first();
         $orderDetail = new orderList([
            'orderId' => $order->orderId,
            'productId' => $req,
            'quantity' => $quant->quantity
         ]);
         $orderDetail->save();

         $cart = cart::firstOrCreate(['userId' => $userId]);

         cartList::where('cartId', $cart->cartId)->where('productId', $req)->delete();

         $product = product::where('productId', $req)->first();

         $product->stock -= $quant->quantity;

         product::updateOrInsert(
            ['productId' => $req],
            ['stock' => $product->stock]
         );

      };
      return redirect()->route('home')->with('success', 'Succesfully placed your order. Your order is in the process of being packed');
   }
}
