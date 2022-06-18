<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        return response()->json(['stat'=>'ok' , 'data'=>'home']);
    }
    function welcome(){
        return response()->json(['stat'=>'ok' , 'data'=>'welcome']);
    }
    function faq(){
        return response()->json(['stat'=>'ok' , 'data'=>'faq']);
    }
    function pages(){
        return response()->json(['stat'=>'ok' , 'data'=>'pages']);
    }

}
