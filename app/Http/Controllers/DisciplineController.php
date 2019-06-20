<?php


namespace App\Http\Controllers;


use App\Discipline;
use App\User;
use Illuminate\Http\Request;

class DisciplineController
{
    public function store(Request $request)
    {
        Discipline::query()->create($request->all());


        return response('', 201);

    }

    public function show(Request $request)
    {
//        $user = $request->user();
        /** @var User $user */
        $user = User::query()->find(1);
        $disciplines = $user->disciplines;
        return response($disciplines);
    }

    public function subscript(Request $request)
    {
        /** @var User $user */
//        $user = $request->user();
        $user = User::query()->find(1);


        $user->disciplines()->attach($request->all());

        return response(null, 201);
    }
}