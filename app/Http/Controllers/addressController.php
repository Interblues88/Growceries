<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\cartList;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class addressController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $addresses = address::where('userId', $user->id)->get();

        return view('addresses.myAddress', compact('addresses'));
    }

    public function create()
    {
        return view('addresses.addAddress');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'receiverName' => 'required|string|max:255',
                'phoneNumber' => 'required|numeric|min_digits:12|max_digits:12',
                'addressName' => 'required|string|max:255',
                'addressDetail' => 'required|string|max:255',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        $addressCount = Address::where('userId', $user->id)->count();

        $status = $addressCount === 0 ? 'primary' : 'alternative';

        address::create([
            'userId' => $user->id,
            'receiverName' => $request->receiverName,
            'phoneNumber' => $request->phoneNumber,
            'addressName' => $request->addressName,
            'addressDetail' => $request->addressDetail,
            'status' => $status,
        ]);

        return redirect()->route('address.index')->with('success', 'Address added successfully.');
    }

    public function destroy(Address $address)
    {
        if($address->status == "primary"){
            $newPrimary = address::where('addressId', '!=', $address->addressId)->first();
            
            $address->delete();
            $newPrimary->status = "primary";
            $newPrimary->save();
        }

        return redirect()->route('address.index')->with('success', 'Address deleted successfully.');
    }

    public function chooseAddress(Request $request)
    {
        $user = Auth::user();
        $addresses = $user->addresses;

        $cartId = $user->cart->cartId;

        $selectedItems = $request->input('selectedItems');

        $cartItems = cartList::whereIn('productId', $selectedItems)->where('cartId', $cartId)->get();

        $selectedDeliveryTime = $request->input('selectedDeliveryTime');

        return view('addresses.chooseAddress', compact('addresses', 'cartItems'));
    }

    public function edit($id)
    {
        $address = address::findOrFail($id);

        if ($address->user_id != Auth::id()) {
            // return redirect()->route('checkout')->withErrors('You are not authorized to edit this address');
        }

        return view('addresses.edit', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'receiverName' => 'required|string|max:255',
            'phoneNumber' => 'required|numeric|min_digits:12|max_digits:12',
            'addressName' => 'required|string|max:255',
            'addressDetail' => 'required|string|max:255',
        ]);

        $address = Address::findOrFail($id);

        if ($address->userId != Auth::id()) {
            return redirect()->route('checkout')->with('error', 'You are not authorized to update this address');
        }
        $address->update($request->all());
        $previousPage = $request->input('previous_page');
        if ($previousPage == route('address.index')) {
            return redirect()->route('address.index')->with('success', 'Address updated successfully');
        } elseif ($previousPage == route('checkout')) {
            return redirect()->route('checkout')->with('success', 'Address updated successfully');
        } else {
            return redirect()->route('home');
        }

    }

    public function setPrimary($id){
        $user = Auth::user();

        $address = Address::where('addressId', $id)->first();
        $allAddress = Address::all();  

        foreach ($allAddress as $value) {
            if ($value->addressId == $address->addressId) {
                $value->status = "primary";
            }
            else{
                $value->status = "alternative";
            }
            $value->save();
        }

        return redirect()->route('address.index')->with('success', 'address primary updated');
    }
}
