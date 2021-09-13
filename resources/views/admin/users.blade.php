@extends('layouts.layout')

    @section('title')
        Users
    @endsection

    @section('menu')
        <a href="/public/admin/"><< Posts</a>
    @endsection

    @section('main')
        @if(!empty(session('message')))
            {{session('message')}}
        @endif
        <table>
            @foreach($users as $user)
                <tr>
                    <td>{{$user -> name}}</td>
                    <td><a href="/public/admin/user/{{$user->id}}">Изменить</a></td>
                </tr>
                @foreach($user->roles as $role)
                    <tr>
                        <td>{{$role-> name}}</td>
                        <td><a href="/public/admin/users/role_del/{{$role->id}}/{{$user->id}}">Удалить Роль</a></td>
                    </tr>

                @endforeach
                <tr>
                    <td><a href="/public/admin/users/role_add/{{$user->id}}">Добавить Роль</a></td>
                </tr>
            @endforeach
        </table>
        {{--pagination--}}
        {{$users -> links()}}
    @endsection
