@extends('layouts.layout')

@section('title')
    Add Role
@endsection

@section('menu')
    <a href="/public/admin/users/"><< Users</a>
@endsection

@section('main')
    <form action="" method="POST">
        @csrf
        <select name="role">
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select><br>
        <input name="submit" type="submit" value="Отправить">
    </form>
@endsection
