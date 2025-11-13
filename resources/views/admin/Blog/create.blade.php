@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>{{ $title ?? '' }}</h5>
    </div>


<div class="card-body">

    <form action="{{ route('blog.store') }}" method="POST">
        @csrf
        <div class="mb-3">
        <label for="" class="form-label">
            Category Blog
        </label>
        <select type="text" name="category_id" class="form-control" >
            <option value="">Choose one</option>
            @foreach ($categories as $category )
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        </div>

        <div class="mb-3">
        <label for="" class="form-label">
            Title
        </label>
        <input type="text" name="title" id=""  class="form-control" placeholder="Title Blog" required>
        </div>

        <div class="mb-3">
        <label for="" class="form-label">
            Content
        </label>
        <textarea name="content" id="summernote" cols="30" rows="10" class="form-control" >
        </textarea>
        </div>


        <div class="mb-3">
        <button class="btn- btn-primary">Save</button>
        </div>
    </form>
</div>
</div>
@endsection
