@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>{{ $title ?? '' }}</h5>
    </div>


<div class="card-body">
    
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="mb-3">
        <label for="" class="form-label">
            fullname
        </label>
        <input type="text" name="name" class="form-control" placeholder="Enter your fullname">
        </div>

        <div class="mb-3">
        <label for="" class="form-label">
            Email
        </label>
        <input type="email" name="email" class="form-control" placeholder="Enter your Email">
        </div>
        
        <div class="mb-3">
        <label for="" class="form-label">
            Password
        </label>
        <input type="password" name="password" class="form-control" placeholder="Enter your password">
        </div>

        
        <div class="mb-3">
        <button class="btn- btn-primary">Save</button>
        </div>
    </form>
</div>
</div>
@endsection