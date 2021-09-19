@extends('layouts.layout')

@section('title')
    {{$title}}
@endsection

@section('menu')
    <ul>
        @foreach($subcategories as $subcategory)
            <li><a href="/public/subcategory/{{$subcategory -> id}}/">{{$subcategory -> name}}</a></li>
        @endforeach
    </ul>
@endsection

@section('main')
    @if(!empty(session('message')))
        {{session('message')}}
    @endif

    <table>
        <tr>
            <th>{{$title}}</th>
        </tr>
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
    {{--    {{ $posts->links() }}--}}

@endsection
