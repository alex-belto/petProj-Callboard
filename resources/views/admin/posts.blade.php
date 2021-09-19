@extends('layouts.layout')


    @section('title')
        Posts
    @endsection

    @section('menu')
        <a href="/public/admin/users">Users >></a>
    @endsection

    @section('main')
        @if(!empty(session('message')))
            {{session('message')}}
        @endif
        <br><br>
        <table>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post -> text}}</td>

                    <td><a href="/public/admin/post/{{$post->id}}">Изменить</a></td>

                    <td><a href="/public/admin/post/delete/{{$post->id}}">Удалить</a></td>
                </tr>
                <tr>
                    <td>{{$post -> user -> name}}</td>
                </tr>

            @endforeach
        </table>
        {{--pagination--}}
        {{$posts -> links()}}
    @endsection
