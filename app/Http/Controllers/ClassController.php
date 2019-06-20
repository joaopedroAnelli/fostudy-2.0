<?php

namespace App\Http\Controllers;

use App\SClass;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function store(Request $request)
    {
        /** @var SClass $class */
        $class = new SClass($request->all());
        $class->created_at = Carbon::now();
        $class->finished_at = (new Carbon($class->starts_at))->addMinutes(40);
        $class->save();

        if (!$request->input('absence')) {
//            $user = $request->user();
            $user = User::query()->find(1);
            $class->users()->attach($user->id);
        }
        return response($class, 201);
    }
}
