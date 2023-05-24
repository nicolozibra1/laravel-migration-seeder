<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Train;

class HomeController extends Controller
{
    public function index (){
        $trains = Train::orderBy('departure_time')->get();
        return view('home', compact('trains'));
    }
    //
}
