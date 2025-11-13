<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Categories;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datas = Blog::with('category')->get();
        $title = "Data Blog";
        return view('admin.blog.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Create New Blog";
        $categories = Categories::get();
        return view('admin.blog.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //query insert
        Blog::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            // toast('Your Post as been submited!', 'success');
        ]);
        Alert::success('Success Title', 'Success Message');
        return redirect()->to('admin/blog');
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
        $edit  = Blog::find($id);
        $title = "Edit Blog";
        return view('admin.blog.edit', compact('edit',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $update = Blog::find($id);
        $update->category_id = $request->category_id;
        $update->titte       = $request->title;
        $update->content     = $request->content;
        $update->slug        = $Str::slug($request->title);

        $update->save();
        return redirect()->to('admin/blog'); //redirect ke Blog
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        Blog::find($id)->delete();
        Alert::success('Success Title', 'User berhasil di hapus');
        return redirect()->to('admin/blog');
    }
}
