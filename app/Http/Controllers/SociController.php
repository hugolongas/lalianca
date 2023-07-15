<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SociController extends Controller
{
    public function Index(){
        return view('socis_formulari');
    }

    public function Store(Request $request){
        return view('socis');
    }
}
