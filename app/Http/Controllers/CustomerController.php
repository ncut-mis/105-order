<?php

namespace App\Http\Controllers;
use App\Customer;
use Auth;

class CustomerController extends Controller
{

    public function index($customer ,$verification_code)
    { $customer = Customer::find($customer);

        if ($verification_code == $customer->verification_code){
            Auth::loginUsingId($customer->id);
            return redirect()->route('menu.index');
        }


        return view('welcome');

    }

}
