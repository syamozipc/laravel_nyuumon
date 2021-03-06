@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
	@parent
	インデックスページ
@endsection

@section('content')
	<p>本文コンテンツ</p>
	<p>必要なだけ記述できます</p>
    <ul>
        @each('components.item', $collection, 'item')
    </ul>
@endsection

@section('footer')
	©copyright ryota
@endsection
