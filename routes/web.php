<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hi', function () {
    return '<html><body><h1>Hi!!</h1><p>This is sample page</p></body></html>';
});

Route::get('hola/{msg}/{comment?}', function ($msg, $comment="default") {

    $html = <<<EOF
        <html>
        <head>
        <title>hola</title>
        <style>
        body {font-size:16pt; color:#999;}
        h1 {font-size:100pt; text-align:right; color:#eee; margin:-40px 0px -50px 0px}
        </style>
        </head>
        <body>
            <h1>hola</h1>
            <p>{$msg}</p>
            <p>サンプルページ{$comment}</p>
        </body>
        </html>
        EOF;

    return $html;
});

// Route::get('hello', function () {
//     return view('hello.index');
// });

Route::get('hello', 'HelloController@index');
