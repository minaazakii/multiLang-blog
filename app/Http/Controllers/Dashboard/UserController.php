<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users.index');
    }

    public function datatable()
    {
        $data = User::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($user) {
                return $btn = '
                <a href="'. route('dashboard.users.edit', $user->id). '" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                <button type="button" id="deletebtn" data-id="'.$user->id.'" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                ';
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function delete(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->save();
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit',
        [
            'user'=> $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->except('_token', '_method'));
        return redirect()->route('dashboard.users.index');
    }

    public function destroy($id)
    {
        //
    }
}
