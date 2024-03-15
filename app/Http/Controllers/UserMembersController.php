<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;

class UserMembersController extends Controller
{
    //
    public function index()
    {
        $user = User::find(auth()->id());
        $levels = Level::all()
        ->transform(function ($level) use ($user) {
            $members_count = $user
            ->members()
            ->wherePivot("level_id", $level->id)
            ->count();
            return [
              "id" => $level->id,
              "name" => $level->name,
              "from" => $level->from,
              "to" => $level->from,
              "level_price" => $level->level_price,
              "members_count" => $members_count,
              'completed' => $members_count > 4,
              "members" => $user
                ->members()
                ->wherePivot("level_id", $level->id)
                ->get()
                ->all(),
                'can_upgrade' => $level->level_price == $user->balanceFloat
            ];
        })
        ->values()
        ->all();


        return view('user.members.index', compact('levels'));
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }
}
