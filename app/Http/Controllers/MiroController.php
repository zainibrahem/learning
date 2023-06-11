<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


class MiroController extends Controller
{
    public function generateCode(){
        $clientId = Setting::where('key','MIRO_CLIENTID')->first();
        $teamId = Setting::where('key','MIRO_TEAMID')->first();
        $url = "https://miro.com/oauth/authorize?response_type=code&client_id=".$clientId->value."&redirect_uri=http://127.0.0.1:8000/getMiroCode&team_id=".$teamId->value;
        return redirect()->away($url)->with('_blank');
        
    }

    public function getMiroCode(){
        $code = request('code');
        if(isset($code)){
            MiroFirstToken($code)->then(function($res){
                $token = Setting::where('key','MIRO_TOKEN')->first();
                $token->value = json_decode($res)->access_token;
                $token->save();
                
                $refresh_token = Setting::where('key','MIRO_REFRESHTOKEN')->first();
                $refresh_token->value = json_decode($res)->refresh_token;
                $refresh_token->save();
                $team_id = Setting::where('key','MIRO_TEAMID')->first();
                $team_id->value = json_decode($res)->team_id;
                $team_id->save();
            })->otherwise(function($error){
                dd($error);
            });
        }
        return redirect('/board');
    }

}
