<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Customers;

class CustomerController extends Controller
{
    public function register(Request $request)
    {
        return Customers::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
    public function getcustomers()
    {
        return response()->json(Customers::all());
    }
}
