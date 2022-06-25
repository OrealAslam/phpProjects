<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Cookie;

class TestController extends Controller
{
    public function index(Request $request){
       $minute = 60;
        $response = new Response('cookie set');
        $response->withCookie(cookie('Mycookie', 'Cookie Value', $minute));
        // dd($response);
        return $response;

    }

    public function get_cookie(Request $request){
        $value = $request->cookie('Mycookie');
        echo $value;
    }
}
