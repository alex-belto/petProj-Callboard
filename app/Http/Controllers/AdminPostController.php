<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    use PostsOptionsTrait; //Edit / delete functions

    public function show()
    {
        $posts = Post::orderBy('updated_at', 'desc') -> simplePaginate(3);

        return view('admin.posts', ['posts'=>$posts]);
    }

}
