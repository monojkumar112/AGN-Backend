@extends('layouts.backend.backend-layouts')

@section('page-content')
<div class="content">
    <div class="container">
        <h1>Add New Category</h1>
        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" required placeholder="Enter your category name">
            </div>

            <a href="{{ route('admin.category.index') }}" type="button" class="btn btn-dark">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
