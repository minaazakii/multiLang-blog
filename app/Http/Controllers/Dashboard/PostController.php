<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use DataTables;

class PostController extends Controller
{

    public function index()
    {
        return view('dashboard.posts.index');
    }

    public function datatable()
    {
        $data = Post::select('*')->with('category');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($post)
            {
                return  '
                <a href="' . route('dashboard.categories.edit', $post->id) . '" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                <button type="button" id="deletebtn" data-id="' . $post->id . '" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                ';
            })
            ->addColumn('title', function ($post)
            {
                return $post->translate(app()->getLocale())->title;
            })
            ->addColumn('smallDesc', function ($post)
            {
                return $post->translate(app()->getLocale())->smallDesc;
            })
            ->addColumn('content', function ($post)
            {
                return $post->translate(app()->getLocale())->content;
            })
            ->addColumn('tags', function ($post)
            {
                return $post->translate(app()->getLocale())->tags;
            })
            ->addColumn('category', function ($post)
            {
                return $post->category->title;
            })

            ->rawColumns(['action','title','smallDesc','content','tags','category'])
            ->make(true);

    }


    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create',
        [
            'categories'=> $categories
        ]);
    }


    public function store(Request $request)
    {
        Post::create($request->except('_token','_method'));
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
