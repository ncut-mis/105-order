<?php

namespace App\Http\Controllers;
use Auth;

class CustomerController extends Controller
{

    public function index($customer)
    {
        Auth::loginUsingId($customer);


        return redirect()->route('menu.index');
    }

}
