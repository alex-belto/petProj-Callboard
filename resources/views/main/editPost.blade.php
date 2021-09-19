@extends('layouts.layout')


@section('title')
    Post
@endsection

@section('menu')
    <a href="/public/admin/"><< Posts</a>
@endsection

@section('main')

    <br><br>
   <form>
       @if($route != 'post/edit/{id}')
       <p>Status:</p>
       <input name="status" type="text" value="{{$post->status}}"><br>
       @endif
       <p>Text:</p>
       <textarea name="text" rows="5" cols="45">{{$post->text}}</textarea><br><br>
       <input name="submit" type="submit" value="Отправить">
   </form>

@endsection
