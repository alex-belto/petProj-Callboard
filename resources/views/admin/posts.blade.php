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
        <table>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post -> text}}</td>
                </tr>
                <tr>
                    <td>{{$post -> user -> name}}</td>
                    <td><a href="/public/admin/post/{{$post->id}}">Изменить</a></td>
                </tr>

            @endforeach
        </table>
        {{--pagination--}}
        {{$posts -> links()}}
    @endsection
