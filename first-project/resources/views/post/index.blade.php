@extends('layouts.app')


@section('title') Index @endsection

@section('content')
    <div class="text-center">
        <a href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
    </div>
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
<!-- i can access obj k arr or arrow -->
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                @if($post->user)
                <td>{{$post->user->name}}</td>
                @else
                <td>not found</td>
                @endif
                <!-- <td>{{$post->user_id}}</td> -->
                <!-- 3shan yzhrle fl posted by men 3ml post -->
                <!-- but i wanna show the name not id-> this by making rsh bet users and post -->
                <td>{{$post->created_at->format('Y-m-d')}}</td>
                <td>
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit', $post->id)}}"  class="btn btn-primary">Edit</a>
                    <!-- delete in a form method to can add my action -->
                    <form style="display:inline" method="post" action="{{route('posts.destroy', $post->id)}}"
                    onclick="return confirm('Are you sure you want to delete this post?')">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
      
        </tbody>
       
       
        <!-- Booosa   -->
        
    </table>
    <div class="d-flex justify-content-center">
        <!-- {{$posts->links()}} -->
        {{ $posts->links() }}
</div>


@endsection

