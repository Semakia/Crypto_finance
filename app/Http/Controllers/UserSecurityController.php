<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSecurityController extends Controller
{
    //
    public function index()
    {
        return view('user.security.index');
    }

    public function store(Request $request){}

    public function show($id){}
}
