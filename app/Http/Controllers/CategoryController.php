<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Redirect;
use Validator;

class CategoryController extends Controller
{
    public function adminIndex(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::all();
            return Datatables::of($categories)
                ->addColumn('edit', function ($row) {
                    $url = route('admin.categories.edit', ['activitat' => $row]);
                    $btn = '<a href="' . $url . '" class="edit btn btn-primary btn.sm">Editar</a>';
                    return $btn;
                })
                ->rawColumns(['edit'])->make(true);
        }
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
        ]);
        $categoryInput = $request->category;

        $category = new Category();
        $category->category = $categoryInput;
        $category->save();
        

        return redirect()->route('admin.categories');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with('category', $category);
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required'
        ]);
        $categoryInput = $request->category;

        $category->category = $categoryInput;
        $category->save();

        return redirect()->route('admin.categories');
    }

    public function delete($id)
    {
        $cateory = Category::findOrFail($id);
        $cateory->delete();
    }

}
