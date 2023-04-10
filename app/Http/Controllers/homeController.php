<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    //index
    public function index(Request $request){
       $data=[
        'title' =>'Rental Mobil Indramayu',
        'header' =>'Siffa World'
       ];
        return view('home',[
            'data' => $data
        ]);

    }
}
