<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Stage;
use App\Models\Subject;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\TeacherSubject;
use App\Models\Setting;
use Illuminate\Support\Facades\Http;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['sometimes'],
            'stages' => ['sometimes'],
            'subjects' => ['sometimes'],
            'all' => ['sometimes'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        try{
            $user =  User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            $user->assignRole('teacher');

            

            if(isset($data['all']) && is_null($data['all'])){
                foreach($data['subjects'] as $subject){
                    $teacherSubject = new TeacherSubject();
                    $teacherSubject->teacher_id = $user->id;
                    $teacherSubject->subject_id = $subject;
                    $teacherSubject->save();
                }
            }
            else{
                $subjects = Subject::all();
                foreach($subjects as $subject){
                    $teacherSubject = new TeacherSubject();
                    $teacherSubject->teacher_id = $user->id;
                    $teacherSubject->subject_id = $subject->id;
                    $teacherSubject->save();
                }
            }
            // $teamMember = Setting::where('key','MIRO_TEAMID')->first();
            // $data = [
            //     'description' => $user->name,
            //     'name' => $user->name,
            //     'teamId' => $teamMember->value,
            // ];
            // $createBoardResponse =  createNewBoard($user,$data);
            // $createBoardResponse->then(function($res) use($user){
            //     $user->board_id = json_decode($res)->id;
            //     $user->save();
            // })->otherwise(function($error){
            //     return $error;
            // });


                
            return $user;
        }
        catch(\Exception $e){
            dd($e);          
        }
    }

    protected function showRegistrationForm(){
        $data['stages'] = Stage::all();
        return view('auth.register',compact('data'));
    }

    public function getSubjects($id){
        $subjects = Subject::where('stage_id',$id)->get();
        return $subjects;
    }
}
