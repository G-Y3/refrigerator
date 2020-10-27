<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Refrigerator;

class RefrigeratorController extends Controller
{
    public function create()
    {
        return view('refrigerator.create');
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
        ]);
        $refrigerator = auth()->user()->refrigerators()->create($data);

        return redirect('/refrigerators/' .$refrigerator->id);
    }   

    public function show(Refrigerator $refrigerator)
    {
        $refrigerator->load('foods');
        return view('refrigerator.show',compact('refrigerator'));
    }


}