<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datas = User::get();
        $title = "Data User";
        return view('admin.user.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Create New User";
        return view('admin.user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //query insert
        User::create($request->all());
        // toast('Your Post as been submited!', 'success');

        Alert::success('Success Title', 'Success Message');
        return redirect()->to('admin/user');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $edit  = User::find($id);
        $title = "Edit User";
        return view('admin.user.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $update = User::find($id);
        $update->name = $request->name;
        $update->email = $request->email;
        if ($request->filled('password')) {
            $update->password = $request->password;
        }


        $update->save();
        return redirect()->to('admin/user'); //redirect ke user
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        User::find($id)->delete();
        Alert::success('Success Title', 'User berhasil di hapus');
        return redirect()->to('admin/user');
    }
}
