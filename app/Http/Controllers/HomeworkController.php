<?php

namespace App\Http\Controllers;

use App\Homework;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function show(Request $request)
    {
        $homeworks = Homework::query()->with(['discipline'])->get();

        return response($homeworks);
    }

    public function store(Request $request)
    {
        $homework = new Homework($request->all());
        $homework->created_at = Carbon::now();
        $homework->save();

        return response($homework, 201);
    }
}
