@extends('layouts.layout')

@section('title')
    {{$title}}
@endsection



@section('main')

    <table>
        <tr>
            <th>{{$title}}</th>
        </tr>
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

@section('form')
    <br><p>Вы можете оставить свое обьявление тут</p>
    <form action="" method="POST">
        @csrf
        <textarea name="text" placeholder="Text">{{ old('text') }}</textarea>
        <input type="submit" name="submit" value="Отправить">
    </form>
@endsection
