<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class PostsController extends Controller
{
    public function showCategory()
    {

    }

    public function showSubcategory()
    {

    }

    public function showPosts()
    {
        $posts = Post::simplePaginate(1);
        $categories = Category::all();

        //dd($result);
        return view('main.posts', ['posts'=>$posts, 'categories'=>$categories]);
    }

}
