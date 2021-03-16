@extends('layouts.helloapp')
<style>
    .pagination {font-size: 10pt;}
    .pagination li {display: inline-block;}
    .pagination svg {width: 20px;}
    tr th a:link {color: white;}
    tr th a:visited {color: white;}
    tr th a:hover {color: white;}
    tr th a:active {color: white;}
</style>
@section('title', 'Index')

@section('menubar')
	@parent
	インデックスページ
@endsection

@section('content')
    @if (Auth::check())
        <p>User: {{$user->name.'('.$user->email.')'}}</p>
    @else
        ※ログインしていません。（<a href="/login">ログイン</a>|<a href="/register">登録</a>）
    @endif
	{{-- <p>{{$msg}}</p>
    @if (count($errors) > 0)
        <p>エラーがあります。修正してください。</p>
    @endif --}}
    <table>
        <tr>
            <th><a href="/hello?sort=name">name</a></th>
            <th><a href="/hello?sort=mail">mail</a></th>
            <th><a href="/hello?sort=age">age</a></th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->mail}}</td>
                <td>{{$item->age}}</td>
            </tr>
        @endforeach
    </table>
    <div class="pagination">
        {{$items->appends(['sort' => $sort])->links()}}
    </div>
@endsection

@section('footer')
	©copyright ryota
@endsection
