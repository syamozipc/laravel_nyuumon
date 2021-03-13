@extends('layouts.helloapp')

@section('title', 'Board.Add')

@section('menubar')
    @parent
    メッセージ投稿
@endsection

@section('content')
    <table>
        <form action="/board/add" method="POST">
            {{ csrf_field() }}
            <tr>
                <th>person id</th>
                <td><input type="number" name="person_id"></td>
            </tr>
            <tr>
                <th>title</th>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <th>message</th>
                <td><input type="text" name="message"></td>
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
