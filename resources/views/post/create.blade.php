@extends('layouts.master')

@section('content')
<h3>Create New Post</h3>
<form method="POST" action="/post">
    @csrf
    @include('layouts.errors')
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Title" name="title">
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" name="body" id="" cols="30" rows="30"></textarea>
    </div>
    <div class="form-group">
      <label for="category">Category</label>
      <input type="category" class="form-control" id="category" aria-describedby="emailHelp" placeholder="Enter Category" name="category">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection