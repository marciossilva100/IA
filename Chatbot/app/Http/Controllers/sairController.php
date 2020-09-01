<?php

namespace App\Http\Controllers;
use \Exception;
use Illuminate\Http\Request;

class sairController extends Controller
{
    public function getAjax(){

        return view('chat');
    }

    public function sair(Request $request){
        // $request->session()->flush();
        $request->session()->forget('email');
    }
}
