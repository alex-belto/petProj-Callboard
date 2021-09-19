<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

trait PostsOptionsTrait
{
    public function edit(Request $request, $id)
    {

        $post = Post::find($id);

        if($request -> has('submit')){

            if($request -> has('status'))
            {
                $post -> status = $request -> input('status');
            }
                $post -> text = $request -> input('text');

            $post -> save();

            $request -> session() -> flash('message', 'Запись успешно обновлена!');

            return redirect('/admin/');
        }
        $route = Route::current()->uri;
        //dd($route);
        return view('main.editPost', ['post'=>$post, 'route'=>$route]);
    }

    public function delPost(Request $request, $id)
    {



        Post::where('id', $id) -> delete();
        $request -> session() -> flash('message', 'Запись успещно удалена!');
        if(Route::current()->uri == 'post/delete/{id}')
        {
            return redirect('/');

        }elseif(Route::current()->uri == 'admin/post/delete/{id}')
        {
            return redirect('/admin/');
        }

    }
}
