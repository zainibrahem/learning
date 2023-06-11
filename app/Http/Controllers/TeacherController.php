<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Auth;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function board(){
        $user = Auth::user();
        $teamMember = Setting::where('key','MIRO_TEAMID')->first();
        $data = [
            'description' => $user->name,
            'name' => $user->name,
            'teamId' => $teamMember->value,
        ];
        $createBoardResponse =  createNewBoard($user,$data);
        $createBoardResponse->then(function($res) use($user){
            $user->board_id = json_decode($res)->id;
            $user->save();
        });
        return view('admin.board');
    }
}
