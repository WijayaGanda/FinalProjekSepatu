<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $pageTitle = 'Home';
        $shoes = Shoe::all();
        return view('home', compact('pageTitle', 'shoes'));
        //return view('home',['pageTitle'=>$pageTitle]);
    }
}
