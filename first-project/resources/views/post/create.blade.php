@extends('layouts.app')

@section('title') Show @endsection

@section('content')
<form action="{{ route('posts.store')}}" method="post">
    @csrf
    <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select name="post_creator" class="form-control">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                <!-- for the dropdown menu of users-->
            </select>
        </div>
        
<x-button type="primary" class="Btn btn-success">create</x-button>

</form>
@endsection