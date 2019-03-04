@extends('layouts.master')

@section('content')
    <h2>{{$post->title}}</h2>
    <p>{{$post->body}}</p>

    <hr>
    <div class="comments">
        <ul class="list-group">
            @foreach ($post->comments as $comment)
                <li class="list-group-item">
                    <strong>
                        {{ $comment->created_at->diffForHumans() }} : &nbsp;
                    </strong>
                    {{ $comment->body }}
                </li>
            @endforeach
        </ul>
    </div>
    <hr>
    <h4>Add Comment</h4>
    <div class="card">
        <form method="POST" action="/post/{{$post->id}}/comment">
            @csrf
            @include('layouts.errors')
            <div class="form-group">
                <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </div>
        </form>
    </div>
@endsection