<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostsController extends Controller
{
    use PostsOptionsTrait;

    public function showCategory($id)
    {
        $categoryName = Category::find($id) -> name;
        $subcategories = Category::find($id) -> sub() -> get();
        $posts = Category::find($id) -> posts() ->where('status', '1') -> get();
        //dd($posts);
        return view('main.category', ['subcategories' => $subcategories, 'posts' => $posts, 'title' => $categoryName]);
    }

    public function showSubcategory($id)
    {
        if(Auth::user()){
            $auth = true;
        }else{
            $auth = false;
        }

        $subcategoryName = Subcategory::find($id)-> name;
        $posts = Post::where('subcategory_id', $id)-> where('status', '1') -> simplePaginate(3);



        return view('main.subcategory', ['title' => $subcategoryName, 'posts' => $posts, 'auth'=>$auth]);
    }

    public function showPosts()
    {
        $posts = Post::where('status', '1') -> simplePaginate(3);
        $categories = Category::all();

        //dd($result);
        return view('main.main', ['posts'=>$posts, 'categories'=>$categories]);
    }


    public function addPost(Request $request, $id)
    {

        if($request -> has('submit')){

            $request -> validate([
                'text'=>'required|MAX:256',
            ]);

            $post = new Post;
            $post -> text = $request -> input('text');
            $post -> user_id =  Auth::id();
            $post -> subcategory_id = $id;

            $post -> save();

            $request -> session() -> flash('message', 'Запись успешно добавлена и отобразится после проверки модератором!');
            return redirect("/subcategory/$id/");
        }
    }



}
