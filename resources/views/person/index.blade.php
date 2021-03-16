@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
        <tr>
            <th>person</th>
            <th>board</th>
        </tr>
        @foreach ($hasItems as $item)
            <tr>
                <td>{{$item->getData()}}</td>
                <td>
                    <table width="100%">
                        @foreach ($item->boards as $obj)
                            <tr>
                                <td>{{$obj->data}}</td>
                            </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        @endforeach
    </table>
    <div style="margin: 10px;">
        <table>
            <tr>
                <th>person</th>
            </tr>
            @foreach ($noItems as $item)
                <tr>
                    <td>{{$item->getData()}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('footer')
    ©ryota 2021
@endsection
