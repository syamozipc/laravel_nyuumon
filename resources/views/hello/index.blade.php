@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
	@parent
	インデックスページ
@endsection

@section('content')
	{{-- <p>{{$msg}}</p>
    @if (count($errors) > 0)
        <p>エラーがあります。修正してください。</p>
    @endif --}}
    <table>
        <tr>
            <th>name</th>
            <th>mail</th>
            <th>age</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->mail}}</td>
                <td>{{$item->age}}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
	©copyright ryota
@endsection
