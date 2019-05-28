<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function store(Request $request)
    {
        /** @var Institution $institution */
        $institution = Institution::query()->create($request->all());

        $institution->courses()->createMany($request->input('courses'));

        return response($institution, 201);
    }

    public function get()
    {
        $institutions = Institution::all();

        return response($institutions);
    }
}