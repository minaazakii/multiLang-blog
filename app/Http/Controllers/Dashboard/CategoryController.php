<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.categories.index');
    }
    public function datatable()
    {
        $data = Category::select('*')->with('parent');
        return  DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($category) {
                return $btn = '
            <a href="' . route('dashboard.categories.edit', $category->id) . '" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
            <button type="button" id="deletebtn" data-id="' . $category->id . '" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            ';
            })
            ->addColumn('title', function ($category) {
                return $category->translate(app()->getLocale())->title;
            })
            ->addColumn('parentRow', function ($category) {
                return ($category->parent_id > 0) ? $category->parent->translate(app()->getLocale())->title : 'Main Category';
             })
        ->rawColumns(['action', 'title','parentRow'])
        ->make(true);
        dd($table);
    }
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.categories.create',
        [
            'categories' => $categories
        ]);
    }
    public function store(Request $request)
    {
        Category::create($request->except('image','_token'));
        return redirect()->route('dashboard.categories.index');
    }
}
