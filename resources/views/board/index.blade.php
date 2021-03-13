@extends('layouts.helloapp')

@section('title', 'Board.Index')

@section('menubar')
    @parent
    ボード一覧
@endsection

@section('content')
    <table>
        <tr>
            <th>Data</th>
        </tr>
        @foreach ($items as $item)
        <tr>
            <td>{{$item->data}}</td>
        </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    ©ryota 2021
@endsection
