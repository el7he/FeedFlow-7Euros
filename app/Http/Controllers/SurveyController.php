<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Organization\StoreOrganization;

class SurveyController extends Controller
{
    public function create()
    {
        return view('survey.create');
    }

    public function store(StoreOrganization $request)
    {
        dd($request->all());
    }
}