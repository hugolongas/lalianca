<?php

namespace App\Http\Controllers;

use App\Activitat;
use App\StaticPage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $activitats = Activitat::orderBy('date', 'asc')->where('date','>=',Carbon::today())->where('published', true)->take(4)->get();
        return view('home')->with('activitats',$activitats);
    }
    public function ateneu()
    {
        return view('ateneu');
    }
    public function socis()
    {
        return view('socis');
    }

    public function serveis(){
        return view('serveis');
    }

    public function contacte(){
        return view('contact');
    }

    public function page()
    {
        $param = request()->segment(count(request()->segments()));        
        return view("pages.".$param)->with('page',$param);
    }
}
