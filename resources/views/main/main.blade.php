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
        @if(!empty(session('message')))
            {{session('message')}}
        @endif
    <table>
        @foreach($posts as $post)
            <tr>
                <td>{{$post -> text}}</td>
                @can('edit', $post)
                <td><a href="/public/post/edit/{{$post->id}}">Изменить</a></td>
                @endcan
                @can('delete', $post)
                <td><a href="/public/post/delete/{{$post->id}}">Удалить</a></td>
                @endcan
            </tr>
            <tr>
                <td>{{$post -> user -> name}}</td>
            </tr>
        @endforeach

    </table>
    {{ $posts->links() }}

    @endsection

