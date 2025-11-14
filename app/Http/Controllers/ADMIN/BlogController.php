<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\categories as ModelsCategories;
use Illuminate\Support\Facades\File;
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
        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'status' => $request->status,
            'writter' => auth()->user->name,

        ];

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('blog' . 'public');
            $data['photo'] = $photo;
        }

        Blog::create($data);
        Alert::success('Success Title', 'Success Create new Blog Succes');
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
        $categories = Categories::get();
        $title = "Edit Blog";
        return view('admin.blog.edit', compact('edit', 'title', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $update = Blog::find($id);

        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'status' => $request->status,
            'writter' => auth()->user()->name,

        ];

        if ($request->hasFile('photo')) {
            if ($update->photo) {
                File::delete(public_path('storage/' . $update->photo));
            }
            $photo = $request->file('photo')->store('blog', 'public');
            $data['photo'] = $photo;
        }


        $update->update($data);
        Alert::success('Success Title', 'User berhasil di edit');
        return redirect()->to('admin/blog'); //redirect ke Blog
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $delete = Blog::find($id)->delete();
        File::delete(public_path('storage/' . $delete->photo));
        Alert::success('Success Title', 'Delete berhasil');
        return redirect()->to('admin/blog');
    }
}
