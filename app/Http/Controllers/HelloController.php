<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
	public function index(Request $request)
	{
		$collection = [
            ['name' => '山田', 'mail' => 'yamada@abc.com'],
            ['name' => '斎藤', 'mail' => 'saito@abc.com'],
            ['name' => '田中', 'mail' => 'tanaka@abc.com'],
		];

        $data = [
            'collection' => $collection,
        ];

		return view('hello.index', $data);
	}

	public function post(Request $request)
	{
		$data = [
			'msg' => $request->msg,
		];

		return view('hello.index', $data);
	}
}
