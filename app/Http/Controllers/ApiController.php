<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $event = \App\Event::all();
        return Response::json($event);
    }

    public function store()
    {
        $arrayToString = implode(',', request()->daysOfWeek);

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
    }
}
