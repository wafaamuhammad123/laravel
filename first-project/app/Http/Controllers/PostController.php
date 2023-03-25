<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;

use App\Models\User;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function store(StorePostRequest $request)
    {
        $post=new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->user_id = $request->input('post_creator');
  
        if ($request->hasFile('image')) {//if i have img
            $image = request()->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();//how img is stored
            $image->storeAs('public', $filename);//save it in public
            $post->img = $filename;
        }
        $post->save();  
        return to_route('posts.index');
    }

    // public function createPost(){
        
    //   
    // }

            //  $request->validate([

            //        'title' => ['required', 'min:3'],//required->validation rule i wanna set on the title key
            //        //min:3->atleast letters is 3
            //        'description' => ['required', 'min:5'],
            //    ],[
            //        'title.required' => 'my custom message',
            //        'title.min' => 'minimum custom message',
            //    ]);
        //takes associative arr key and val

//        $data = $request->all();

        //insert the form data in the database
       
        //redirect to index route
    
    
      
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

        if ($request->hasFile('image')) {
            if ($post->img) {//old img
                $deleted=$post->img;
                Storage::delete('public/'.$deleted);
            }
            $image = request()->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/', $filename);
            $post->img = $filename;
            // $path = Storage::putFileAs('posts', $image, $filename);
            // $post->image_path = $path;
        }

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





