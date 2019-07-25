<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Cache::get('users')!=null){
            return response()->json(Cache::get('names'),200);
        }else{

            $users=User::all();
            Cache::put('users',$users);

        }
    }

    public function set(Request $request)
    {

        $name=$request->name;

        $old_names=Cache::get('names');

        array_push($old_names,$name);
        Cache::put('names',$old_names);

        return response()->json(Cache::get('names'),200);
    }
}
