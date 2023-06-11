<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Auth;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function board(){
        $newTokenResoinse = generateNewMiroToken();
        $newTokenResoinse->then(function($response){
        $refreshToken = Setting::where('key','MIRO_REFRESHTOKEN')->first();
        $refreshToken->value = json_decode($response)->refresh_token;
        $refreshToken->save();
        $token = Setting::where('key','MIRO_TOKEN')->first();
        $token->value = json_decode($response)->access_token;
        $token->save();
    
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
        })->otherwise(function($error){
            throw new \Exception($error->getMessage());
        });
       
        return view('admin.board');
    }
}
