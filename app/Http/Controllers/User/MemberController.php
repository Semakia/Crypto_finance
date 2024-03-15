<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());

        $levels = Level::all()
        ->transform(function ($level) use ($user) {

            return [
              "id" => $level->id,
              "name" => $level->name,
              "from" => $level->from,
              "to" => $level->from,
              "level_price" => $level->level_price,
              "members" => $user
                ->members()
                ->wherePivot("level_id", $level->id)
                ->get()
                ->all()
            ];
        })
        ->values()
        ->all();

        $members = $user->members->groupBy('pivot.level_id')->transform(function ($item, $key) {
            $level = Level::find($key);
            return [
                'name' => $level->name,
                'color' => $level->color,
                'members' => $item->all()
            ];
        })->values()->all();

        return view('user.members.index', compact('levels'));
    }
}
