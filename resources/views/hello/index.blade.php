@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
	@parent
	インデックスページ
@endsection

@section('content')
	<p>本文コンテンツ</p>
    <p>
        Controller value<br>
        'message' = {{$message}}
    </p>
    <p>
        ViewComposer value<br>
        'view_message' = {{$view_message}}
    </p>
@endsection

@section('footer')
	©copyright ryota
@endsection
