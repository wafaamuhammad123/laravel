<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    //static data
    {
        $allPosts = [
            [
                'id' => 1,
                'title' => 'Laravel',
                'posted_by' => 'Ahmed',
                'created_at' => '2022-08-01 10:00:00'
            ],

            [
                'id' => 2,
                'title' => 'PHP',
                'posted_by' => 'Mohamed',
                'created_at' => '2022-08-01 10:00:00'
            ],

            [
                'id' => 3,
                'title' => 'Javascript',
                'posted_by' => 'Ali',
                'created_at' => '2022-08-01 10:00:00'
            ],
        ];

        return view('post.index', ['posts' => $allPosts]);
    }

    public function show($id)
    {
//        dd($id);
        $post =  [
            'id' => 3,
            'title' => 'Javascript',
            'posted_by' => 'Ali',
            'created_at' => '2022-08-01 10:00:00',
            'description' => 'hello description',
        ];

//        dd($post);

        return view('post.show', ['post' => $post]);
        //to use show view..to show file show in the forlder post in view
    }


    public function create()
    {
        return view('post.create');

    }
    public function edit()
    {
        return view('post.edit');

    }
    public function store()
    // fn returns me bk to the index pg
    {
        return redirect()->route('posts.index');

    }



}