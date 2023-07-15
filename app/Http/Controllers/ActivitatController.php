<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Activitat;
use App\Category;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Redirect;
use Validator;
use Storage;
use Image;
use Carbon\Carbon;

use App\Http\Controllers\OtherController;

class ActivitatController extends Controller
{
    public function index($date='')
    {
        if($date==''){
        $activitats = Activitat::orderBy('date', 'asc')->where('date','>=',Carbon::today())->where('published', true)->get();
        return view('activitats')->with('activitats', $activitats);
        }
        
        $activitats = Activitat::orderBy('date', 'asc')->where('date','=',$date)->where('published', true)->get();
        return view('activitats')->with('activitats', $activitats);
    }

    public function ByDate($year, $month){
        $activitats = Activitat::orderBy('date', 'asc')
        ->whereRaw("(MONTH(date) = $month AND YEAR(date) = $year)")
        ->where('published', true)->get();
        return $activitats;
    }



    public function Show($slug)
    {
        $activitat = Activitat::firstOrFail()->where('url', $slug)->get();

        if ($activitat->count() > 0)
            return view('activitat')->with('activitat', $activitat[0]);
        else
            return response()->view('errors.404', [], 404);
    }

    public function adminIndex(Request $request)
    {
        if ($request->ajax()) {
            $activitats = Activitat::all();
            return Datatables::of($activitats)
                ->addColumn('edit', function ($row) {
                    $url = route('admin.activitats.edit', ['activitat' => $row]);
                    $btn = '<a href="' . $url . '" class="edit btn btn-primary btn.sm">Editar</a>';
                    return $btn;
                })
                ->rawColumns(['edit'])->make(true);
        }
        return view('admin.activitats.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.activitats.create')->with('categories',$categories);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'resume' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);
        $title = $request->title;
        $resume = $request->resume;
        $description = $request->description;
        $date = $request->date;
        $date = str_replace('/', '-', $date);
        $date = date('Y-m-d', strtotime($date));
        $time = $request->time;
        $price = $request->price;
        $buy_url = $request->buy_url;
        $category_id = $request->category;

        if ($description == null) $description = "";
        if ($buy_url == null) $buy_url = "";        

        $imgPoster = $request->file('imagePosterFile');
        $image_poster_name = "";
        //Resize Poster Img
        if ($imgPoster != null) {
            $resized_poster_image = Image::make($imgPoster->getRealPath())->resize(540, 778)->encode('jpg');
            $hash = md5($resized_poster_image->__toString());
            $image_poster_name = $hash . '.' . $imgPoster->getClientOriginalExtension();
            $filePath = $pathMedia . $image_poster_name;

            Storage::disk('public')->put($filePath, $resized_poster_image);
        }

        $imgCover = $request->file('imageCoverFile');
        $image_cover_name = "";
        //Resize Cover Img
        if ($imgCover != null) {
            $resized_cover_image = Image::make($imgCover->getRealPath())->resize(250, 250)->encode('jpg');
            $hash = md5($resized_cover_image->__toString());
            $image_cover_name = $hash . '.' . $imgCover->getClientOriginalExtension();
            $filePath = $path . $image_cover_name;

            Storage::disk('public')->put($filePath, $resized_cover_image);
        }
        $activitat = new Activitat();
        $activitat->title = $title;
        $activitat->resume = $resume;
        $activitat->description = $description;
        $activitat->date = $date;
        $activitat->time = $time;
        $activitat->price = $price;
        $activitat->buy_url = $buy_url;
        $activitat->img_cover = $image_cover_name;
        $activitat->img_poster = $image_poster_name;
        $activitat->published = false;
        $activitat->category_id = $category_id;
        $activitat->save();
        

        return redirect()->route('admin.activitats');
    }

    public function edit(Activitat $activitat)
    {
        $categories = Category::all();
        $activitat->date = date('d/m/Y', strtotime($activitat->date));
        return view('admin.activitats.edit')->with('activitat', $activitat)->with('categories',$categories);
    }

    public function update(Request $request, Activitat $activitat)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'resume' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);
        $title = $request->input('title');
        $resume = $request->resume;
        $description = $request->description;
        $date = $request->date;
        $date = str_replace('/', '-', $date);
        $date = date('Y-m-d', strtotime($date));
        $time = $request->time;
        $price = $request->price;
        $buy_url = $request->buy_url;
        
        $category_id = $request->category;

        if ($description == null) $description = "";
        if ($buy_url == null) $buy_url = "";

        $path = 'media/';

        $imgPoster = $request->file('imagePosterFile');
        $image_poster_name = $activitat->img_poster;
        //Resize Poster Img
        if ($imgPoster != null) {
            $resized_poster_image = Image::make($imgPoster->getRealPath())->resize(540, 778)->encode('jpg');
            $hash = md5($resized_poster_image->__toString());
            $image_poster_name = $hash . '.' . $imgPoster->getClientOriginalExtension();
            $filePath = $path . $image_poster_name;

            Storage::disk('public')->put($filePath, $resized_poster_image);
        }

        $imgCover = $request->file('imageCoverFile');
        $image_cover_name = $activitat->img_cover;
        //Resize Cover Img
        if ($imgCover != null) {
            $resized_cover_image = Image::make($imgCover->getRealPath())->resize(250, 250)->encode('jpg');
            $hash = md5($resized_cover_image->__toString());
            $image_cover_name = $hash . '.' . $imgCover->getClientOriginalExtension();
            $filePath = $path . $image_cover_name;

            Storage::disk('public')->put($filePath, $resized_cover_image);
        }

        $activitat->title = $title;
        $activitat->resume = $resume;
        $activitat->description = $description;
        $activitat->date = $date;
        $activitat->time = $time;
        $activitat->price = $price;
        $activitat->buy_url = $buy_url;
        $activitat->img_cover = $image_cover_name;
        $activitat->img_poster = $image_poster_name;
        $activitat->published = false;
        $activitat->category_id = $category_id;
        $activitat->save();

        return redirect()->route('admin.activitats');
    }

    public function publish($id)
    {
        $activitat = Activitat::findOrFail($id);
        $activitat->published = true;
        $url = $this->_seoUrl($activitat->title . "_" . $id);
        if ($activitat->url == null) $activitat->url = $url;
        $activitat->save();
    }
    public function unpublish($id)
    {
        $activitat = Activitat::findOrFail($id);
        $activitat->published = false;
        $activitat->save();
    }

    public function delete($id)
    {
        $activitat = Activitat::findOrFail($id);
        $path = 'media/';
        $img_cover = $activitat->img_cover;
        $filePathCover = $path . $img_cover;
        $img_poster = $activitat->img_poster;
        $filePathPoster = $path . $img_poster;

        Storage::disk('public')->delete($filePathCover);
        Storage::disk('public')->delete($filePathPoster);
        $activitat->delete();
    }

    /*Private Functions*/
    private function _seoUrl($string)
    {
        //Lower case everything
        $finalString = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $finalString = preg_replace("/[^a-z0-9_\s-]/", "", $finalString);
        //Clean up multiple dashes or whitespaces
        $finalString = preg_replace("/[\s-]+/", " ", $finalString);
        //Convert whitespaces and underscore to dash
        $finalString = preg_replace("/[\s_]/", "-", $finalString);
        return $finalString;
    }
    /*End Private Functions*/
}
