@extends('layouts.layout')

    @section('title')
        Posts
    @endsection

    @section('menu')
        <ul>
            @foreach($categories as $category)
               <li><a href="/public/category/{{$category -> id}}">{{$category -> name}}</a></li>
            @endforeach
        </ul>
    @endsection

    @section('main')

    <table>
        @foreach($posts as $post)
            <tr>
                <td>{{$post -> text}}</td>
            </tr>
            <tr>
                <td>{{$post -> user -> name}}</td>
            </tr>
        @endforeach

    </table>
    {{ $posts->links() }}

    @endsection

