@extends('layouts.layout')


@section('title')
    Posts
@endsection

@section('menu')
    <a href="/public/admin/">Posts</a>
@endsection

@section('main')
    <br><br>
   <form>
       <p>Status:</p>
       <input name="status" type="text" value="{{$post->status}}"><br>
       <p>Text:</p>
       <textarea name="text" rows="5" cols="45">{{$post->text}}</textarea><br><br>
       <input name="submit" type="submit" value="Отправить">
   </form>

@endsection
