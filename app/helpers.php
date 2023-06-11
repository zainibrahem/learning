<?php 
use App\Models\Setting;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\Promise;
use \GuzzleHttp\Psr7\Request;

if(!function_exists('generateMiroCode')){
     function generateMiroCode(){
        $client = new Client();
        $promise = new Promise();
        $clientId = Setting::where('key','MIRO_CLIENTID')->first();
        $teamId = Setting::where('key','MIRO_TEAMID')->first();
        $url = "https://miro.com/oauth/authorize?response_type=code&client_id=".$clientId."&redirect_uri=https://127.0.0.1:8000/&state=123xyz&team_id=".$teamId;
        return redirect()->away($url)->with('_blank');
     
    }
}

if(!function_exists('MiroFirstToken')){

    function MiroFirstToken($code){
        $clientSecret = Setting::where('key','MIRO_CLIENTSECRET')->first();
        $clientId = Setting::where('key','MIRO_CLIENTID')->first();
        $client = new Client();
        $url = 'https://api.miro.com/v1/oauth/token?grant_type=authorization_code&client_id='.$clientId->value.'&client_secret='.$clientSecret->value.'&code='.$code.'&redirect_uri=http://127.0.0.1:8000/getMiroCode';
        $promise = new Promise();
        $request = new Request('POST',$url,[]);
      
        $response = $client->sendAsync($request);
        $response->then(function($res) use($promise){
            $promise->resolve($res->getBody());
        },function($error) use($promise){
            $promise->reject($error);
        })->otherwise((function($error){
            dd($error);
        }));
        $response->wait();
        return $promise;
    }
}
if (!function_exists('generateNewMiroToken')) {
    
    function generateNewMiroToken()
    {
        $client = new Client();
        $promise = new Promise();
        $refreshToken = Setting::where('key','MIRO_REFRESHTOKEN')->first();
        $token = Setting::where('key','MIRO_TOKEN')->first();
        $url = 'https://api.miro.com/v1/oauth/token?grant_type=refresh_token&client_id=3458764556746169991&client_secret=gehYIlSjGhGdJEnNQWaWYrAcYgtQ125O&refresh_token='.$refreshToken->value; // Replace with your API endpoint URL
        $request = new \GuzzleHttp\Psr7\Request('POST',$url,[]);
        $response = $client->sendAsync($request);
        $response->then(
            function ($res) use($promise,$token) {
               
                $promise->resolve($res->getBody());
            },
            function ($e) use($promise){
                dd($e->getMessage());
                $promise->reject($e->getMessage());
            }
        );
        $response->wait();
        return $promise;

       
    }
}

if (!function_exists('createNewBoard')) {
   
    function createNewBoard($user,$data)
    {
        
        $client = new Client();
        $promise = new Promise();
        $url = 'https://api.miro.com/v2/boards'; // Replace with your API endpoint URL
        $token = Setting::where('key','MIRO_TOKEN')->first();
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$token->value,
        ];
        $request = new Request('POST', $url, $headers);
        $options = ['json' => $data];
        
        $response = $client->sendAsync($request, $options);
        $response->then(
            function ($response) use ($promise) {
                
                $promise->resolve($response->getBody());
            },
            function ($reason) use ($promise) {
                $promise->reject($reason);
            }
        );

        $response->wait();
        return $promise;

       
    }
}

if (!function_exists(('deleteBoard'))){
    function deleteBoard($headers){
        $client = new Client();
        $promise = new Promise();
        $url = 'https://api.miro.com/v2/boards/'.Auth::user()->board_id; // Replace with your API endpoint URL
        $token = Setting::where('key','MIRO_TOKEN')->first();
       
        $client = new \GuzzleHttp\Client();
        
        // $response = $client->request('DELETE', 'https://api.miro.com/v2/boards/'.Auth::user()->board_id, [
        //     'headers' => [
        //         'accept' => 'application/json',
        //         'authorization' => 'Bearer '.$token->value,
        //     ]
        // ]);
       
        // echo $response->getBody();
        $request = new Request('DELETE',$url,$headers);
        $response = $client->sendAsync($request);
        $response->then(
            function ($res) use($promise,$token) {
               
                $promise->resolve($res->getBody());
            },
            function ($e) use($promise){
                $promise->reject($e->getMessage());
            }
        );
        $response->wait();


        // $request = new Request("DELETE", $url, $headers);
        
        // $response = $client->request('DELETE',$url,['headers'=> [
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer '.$token->value
        // ]]);
        
        // $response->then(
            
        //     function ($res) use($promise,$token) {
        //         Auth::user()->board_id ='';
               
        //         $promise->resolve($res->getBody());
        //     },
        //     function ($e) use($promise){
                
        //         dd($e->getMessage());
        //         $promise->reject($e->getMessage());
        //     }
            
        // );
        
       
        // $response->wait();
        return $promise;  
    }
}