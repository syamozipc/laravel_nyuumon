@extends('layouts.helloapp')

@section('title', 'Person.del')

@section('menubar')
    @parent
    削除
@endsection

@section('content')
    <table>
        <form action="/person/del" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$form->id}}">
            <tr>
                <th>name</th>
                <td>{{$form->name}}</td>
            </tr>
            <tr>
                <th>mail</th>
                <td>{{$form->mail}}</td>
            </tr>
            <tr>
                <th>age</th>
                <td>{{$form->age}}</td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </form>
    </table>
@endsection

@section('footer')
    ©ryota 2021
@endsection
