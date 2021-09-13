<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function show()
    {
        $posts = Post::orderBy('updated_at', 'desc') -> simplePaginate(3); //сортировать по дате обновления

        return view('admin.posts', ['posts'=>$posts]);
    }

    public function edit(Request $request, $id)
    {

        $post = Post::find($id);

        if($request -> has('submit')){

            $post -> status = $request -> input('status');
            $post -> text = $request -> input('text');

            $post -> save();

            $request -> session() -> flash('message', 'Запись успешно обновлена!');

            return redirect('/admin/');
        }

        return view('admin.editPost', ['post'=>$post]);
    }
}
