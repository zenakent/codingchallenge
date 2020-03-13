<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
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
    return view('calendar');
});

Route::get('/api', function () {
    $event = DB::table('events')->select('title', 'daysOfWeek', 'startRecur', 'endRecur',)->get();
    return Response::json($event);
});

Route::post('/api', function () {
    // 'title', 'startRecur', 'endRecur', 'daysOfWeek'
    // dd(request());
    // $daysOfWeek = request()->daysOfWeek;
    // $arr = [];

    // foreach ($daysOfWeek as $days) {
    //     array_push($arr, $days);
    // }

    // dd($arr);
    // dd($daysOfWeek);
    $arrayToString = implode(',', request()->daysOfWeek);
    // dd($arrayToString);
    request()->validate([
        'title' => 'required',
        'startRecur' => 'required',
        'endRecur' => 'required',
        'daysOfWeek' => 'required',
    ]);


    \App\Event::create([
        'title' => request()->title,
        'startRecur' => request()->startRecur,
        'endRecur' => request()->endRecur,
        'daysOfWeek' => $arrayToString,
    ]);

    return redirect('/api');
});
