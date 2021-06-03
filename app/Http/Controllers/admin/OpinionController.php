<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function index()
    {
        return view('admin.opinions.index');
    }

    public function show(Opinion $opinion)
    {
        //dd($opinion);
        return view('admin.opinions.show', compact('opinion'));
    }
}
