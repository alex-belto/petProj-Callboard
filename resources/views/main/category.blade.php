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
    {{--    {{ $posts->links() }}--}}

@endsection
