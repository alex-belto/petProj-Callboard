@extends('layouts.layout')


@section('title')
    User
@endsection

@section('menu')
    <a href="/public/admin/users/"><< Users</a>
@endsection

@section('main')
    <br><br>
    <form>
        <p>Name:</p>
        <input name="name" type="text" value="{{$user->name}}"><br>
        <p>Email:</p>
        <input name="email" type="email" value="{{$user->email}}"><br>
        <p>Status:</p>
        <select name="status">
            <option value="active">active</option>
            <option value="banned">banned</option>
        </select><br><br>
        <input name="submit" type="submit" value="Отправить">
    </form>



@endsection

