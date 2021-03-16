<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
	public function index(Request $request)
	{
        $user = Auth::user();

        $sort = $request->sort ?? 'id';
        $items = Person::orderBy($sort, 'asc')->paginate(2);
        $param = ['items' => $items, 'sort' => $sort, 'user' => $user];

        return view('hello.index', $param);
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

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age'  => $request->age,
        ];

        // DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        DB::table('people')->insert($param);

        return redirect('/hello');
    }

    public function edit(Request $request)
    {
        // $param = ['id' => $request->id];

        // $item = DB::select('select * from people where id = :id', $param);
        $item = DB::table('people')->where('id', $request->id)->first();

        return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        // DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $param);
        DB::table('people')->where('id', $request->id)->update($param);

        return redirect('/hello');
    }

    public function del(Request $request)
    {
        // $param = ['id' => $request->id];
        // $item = DB::select('select * from people where id = :id', $param);

        $item = DB::table('people')->where('id', $request->id)->first();

        return view('hello.del', ['form' => $item]);
    }

    public function remove(Request $request)
    {
        // $param  = ['id' => $request->id];
        // DB::delete('delete from people where id = :id' , $param);
        DB::table('people')->where('id', $request->id)->delete();

        return redirect('/hello');
    }

    public function show(Request $request)
    {
        $page = $request->page;
        $items = DB::table('people')
            ->offset(($page - 1) * 3)
            ->limit(3)
            ->get();
        return view('hello.show', ['items' => $items]);
    }

    public function rest(Request $request)
    {
        return view('hello.rest');
    }

    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get('msg');

        return view('hello.session', ['session_data' => $sesdata]);
    }

    public function ses_put(Request $request)
    {
        $msg = $request->input;
        $request->session()->put('msg', $msg);

        return redirect('hello/session');
    }
}
