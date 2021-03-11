<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use App\Models\UserAddressBook;
use App\Models\ProductOrder;
use App\Models\ProductOrderDetails;
class CustomerController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect()->route('frontend_index')->with('success', 'You are Logged in.');
        }else{
            return view('frontend.common.dashboard.login');
        }
    }

    //Dhasboard
    public function dashboard(){
        if(Auth::check()){
            $getAllOrder = ProductOrder::with('user', 'orderDetails')->where('user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
            return view('frontend.common.dashboard.dashboard', compact('getAllOrder'));
        }else{
            return redirect()->route('frontend_customer_login');
        }
    }

    //Ajax request Order Quick View
    public function orderQuickViewAjax($id)
    {
        $order = ProductOrder::with('user', 'orderDetails')->where('id', $id)->orderBy('created_at', 'DESC')->first();
        return view('frontend.product.order-modal', compact('order'));
    }

    /**
     * Account Details Update
     */
    public function accountUpdate(Request $request){
        if(Auth::check()){
           $data = User::find(Auth::user()->id);
           $data->name = $request->name;
            if(Hash::check($request->password, $data->password) && $request->password == $request->confirm_passowrd){
                $data->save();
                return redirect()->back()->with('success', 'Account Updated Successfully');
            } else {
                return redirect()->back()->with('delete', 'Password not matched');
            }
        }else{
            return redirect()->route('frontend_customer_login');
        }
    }

    //Address New
    public function AddressUpdate(Request $request){
         if(Auth::check()){

            //validation
            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'postal_code' => 'required',
                'thana' => 'required',
                'city' => 'required',
                'country' => 'required',
                'phone' => 'required',
            ]);


            $a = UserAddressBook::where('user_id', Auth::user()->id);
            if($a->count() > 0){
                $address = UserAddressBook::where('user_id', Auth::user()->id)->first();
            } else {
                $address = new UserAddressBook();
            }
            $address->user_id = Auth::user()->id;
            $address->name = $request->name;
            $address->address = $request->address;
            $address->postal_code = $request->postal_code;
            $address->thana = $request->thana;
            $address->city = $request->city;
            $address->country = $request->country;
            $address->phone = $request->phone;
            $address->save();
           
           return redirect()->back()->with('success', 'Billing Address Updated Successfully');
        } else{
            return redirect()->route('frontend_customer_login');
        }
    }

}
