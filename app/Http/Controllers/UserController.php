<?php

namespace App\Http\Controllers;

use App\Address;
use App\Contact;
use App\Customers;
use App\Mail\MailOrder;
use App\OrderDetail;
use App\Orders;
use App\Policy;
use App\SlideImage;
use App\WeddingDressCategory;
use App\DressProduct;
use App\StyleDress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function userLogin(){
        $styles = WeddingDressCategory::all();
        $isStyle = false;
        return view('user.login', compact( 'styles', 'isStyle'));
    }

    public function userRegister(){
        $styles = WeddingDressCategory::all();
        $isStyle = false;
        return view('user.register', compact( 'styles', 'isStyle'));
    }

    public function registerSave(Request $request){
        $checkMail = Customers::query()->where('email', $request->email_user)->first();
        if($checkMail){
            return redirect()->route('userRegister')->with('error','Error! Email already exists.');
        }else {
            Customers::query()->create([
                'name' => $request->name_user,
                'email' => $request->email_user,
                'password' => Hash::make($request->pass_user),
            ]);
        }
        return redirect()->route('userLogin')->with('success','Success! please login.');
    }

    public function checkLogin(Request $request)
    {
        if ($request->isMethod('POST')) {
            //Xu li login
            $account = $request['email_user'];
            $password = $request['pass_user'];
            if ((Auth::guard('customers')->attempt(['email' => $account, 'password' => ($password)]))) {
                return redirect()->route('homeIndex');
            }
            return redirect()->route('userLogin')
                ->with('error', 'email or password is incorrect!');
        }
    }

    public function userDetail(){
        $styles = WeddingDressCategory::all();
        $isStyle = false;
        $customer_id = Auth::guard('customers')->user()->id;
        $address = Address::query()->where('customer_id', $customer_id)->first();
        return view('user.detail', compact( 'styles', 'isStyle','address'));
    }

    public function userLogout(){
        Auth::guard('customers')->logout();
        $styles = WeddingDressCategory::all();
        $isStyle = false;
        return redirect()->route('userLogin');
    }

    public function userAddress(){
        $styles = WeddingDressCategory::all();
        $isStyle = false;
        $customer_id = Auth::guard('customers')->user()->id;
        $address = Address::query()->where('customer_id', $customer_id)->first();
        return view('user.address', compact( 'styles', 'isStyle', 'address'));
    }

    public function addressStore(Request $request){
        Address::query()->create([
           'customer_id' => Auth::guard('customers')->user()->id,
           'name' => $request->name_order,
           'phone' => $request->phone_order,
           'email' => $request->email_order,
            'address' => $request->address_order,
        ]);
        return redirect()->route('userDetail')->with('success','add address success!');
    }

    public function addressSave($id,Request $request){
        Address::query()->where('id', $id)->update([
            'name' => $request->name_order,
            'phone' => $request->phone_order,
            'email' => $request->email_order,
            'address' => $request->address_order,
        ]);
        return redirect()->route('userDetail')->with('success','save address success!');
    }

    public function addressDestroy(Request $request){
        $id = $request->id;
        Address::query()->where('id', $id)->delete();
        return response()->json(['success' => true,'msg' => 'Delete success!'], 200);
    }
}
