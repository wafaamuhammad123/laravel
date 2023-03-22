@extends('layouts.app')

@section('title') Show @endsection

@section('content')
<form method="post" action="{{route('posts.update', $post->id)}}">
    @csrf
    @method('PUT')

<div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1"  value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"  value="{{$post->description}}" ></textarea>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">post creator</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" value="{{$post->user->name}}" >
        </div>
        

<x-button type="primary" class="btn btn-success">update</x-button>
</form>
@endsection