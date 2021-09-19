@extends('layouts.layout')

@section('title')
    {{$title}}
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
    {{ $posts->links() }}

@endsection

@section('form')
    @if($auth)
    <br><p>Вы можете оставить свое обьявление тут:</p>
    <form action="" method="POST">
        @csrf
        <textarea rows="7" cols="45" name="text" placeholder="Text">{{ old('text') }}</textarea><br><br>
        <input type="submit" name="submit" value="Отправить">
    </form>
    @endif
@endsection
