<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    //
    public function index()
    {
        return view('user.profile.index');
    }

    public function store(Request $request){}

    public function show($id){}
}
