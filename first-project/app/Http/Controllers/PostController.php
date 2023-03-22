<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\post;
use Illuminate\Http\Request;

//use App\Utils\PaginateCollection;


class PostController extends Controller
{
    public function index()
    {
        //query to select * from posts

        // $allPosts = Post::all();

        //To paginate
        $allPosts = Post::paginate(3);

        // $allPosts = User::get();
        // $allPosts = PaginateCollection::paginate($allPosts, 5);

       
       return view('post.index',['posts' => $allPosts]);
    }
    // public function index()
    // {
    //     $allPosts = Post::paginate(10);
    //     $allPosts = Post::all(); //select * from posts
    //     //return to me obj has 3 obj each one has app model post type

    //     return view('post.index', ['posts' => $allPosts]);
    // }

//     public function show($id)
//     {
// //        $post = Post::find($id); //select * from posts where id = 1 limit 1;//another way

//         $postCollection = Post::where('id', $id)->get(); //Collection object .... select * from posts where id = 1;
// //the ->get() means that i've finished building query so execute it
// //colections is obj has gp of items like small objects(post models)
// //postmodel obj..

//         $post = Post::where('id', $id)->first(); //Post model object ... select * from posts where id = 1 limit 1;

// //        Post::where('title', 'Laravel')->first();

//         return view('post.show', ['post' => $post]);
//     }


public function show($id)
{
    // $postCollection = Post::where('id', $id)->get();
    $post = Post::where('id', $id)->first();
    $comments=$post->comments;
    // dd($comments);
    return view('post.show', ["comments"=>$comments],['post' => $post]);
}
    public function create()
    {
        $users = User::all();
        //to be dynamic dropdown

        return view('post.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        //get the form data
//        $data = request()->all();
//
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

//        $data = $request->all();

        //insert the form data in the database
        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
        ]);

        //redirect to index route
        return to_route('posts.index');
    }
    
      
    public function edit($id)//when i click on edit so to go to that post im clicking on ive to send id of that post
    
    {
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }//then go to that edit pg

    public function update(Request $request, $id)
    //search by id..update on button on edit
    {
        $post = Post::find($id);
    
        $post->title = $request->input('title');//new data in the post data
        $post->description = $request->input('description');
        $post->save();
    
        return redirect()->route('posts.index');
    }
    
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);//is the id exists or not
        $post->delete();
        return redirect()->route('posts.index');
    }
   
      

}
    // public function create()
    // {
    //     return view('post.create');

    // }
    // public function edit()
    // {
    //     return view('post.edit');

    // }

    // public function update($id){
    //     return redirect()->route("posts.index");
    // }
    // public function store()
    // // fn returns me bk to the index pg
    // {
    //     return redirect()->route('posts.index');

    // }



