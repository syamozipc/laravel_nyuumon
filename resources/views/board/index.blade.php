@extends('layouts.helloapp')

@section('title', 'Board.Index')

@section('menubar')
    @parent
    ボード一覧
@endsection

@section('content')
    <table>
        <tr>
            <th>message</th>
            <th>name</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->message}}</td>
                <td>{{$item->person->name}}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    ©ryota 2021
@endsection
