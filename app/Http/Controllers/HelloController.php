<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Http\Response;
use Validator;

class HelloController extends Controller
{
	public function index(Request $request)
	{
        if ($request->hascookie('msg'))
        {
            $msg = 'Cookie: '.$request->cookie('msg');
        } else {
            $msg = 'クッキーはありません';
        }
        return view('hello.index', ['msg' => $msg]);
    }

	public function post(Request $request)
	{
        $validate_rule = [
            'msg' => 'required'
        ];

        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = new Response(view('hello.index', ['msg' => $msg.'をクッキーへ保存しました']));
        $response->cookie('msg', $msg, 1);
        return $response;
	}
}
