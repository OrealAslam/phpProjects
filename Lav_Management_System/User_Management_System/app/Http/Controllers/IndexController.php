<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // import user controller

class IndexController extends Controller
{
    public function index()
    {

        return view('index');
    }

    public function register(Request $request)
    {

        // validating inputs
        $req->validate([
            'name' => 'required|min:7',
            'email' => 'required|email',
            'roleSelected' => 'required'
        ]);

        // creating record 

        $create = user::insert([
            'name' => $request['name'],
            'email' => $request['email'],
            'user_role' => $request['roleSelected'],
        ]);

        if ($create) {
            // $request->session()->put();
            return redirect(route('home'))->with('status', 'success');
        } else {
            return redirect(route('home'))->with('status', 'denied');
        }
    }
}
