<?php

namespace App\Http\Controllers;

use App\Homework;
use App\Test;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show(Request $request)
    {
        $test = Test::query()->with(['discipline'])->get();

        return response($test);
    }

    public function store(Request $request)
    {
        $test = new Test($request->all());
        $test->created_at = Carbon::now();
        $test->save();

        return response($test, 201);
    }
}
