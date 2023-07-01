<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Setting;
use App\Models\Stage;
use App\Models\Subject;
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

    public function stages(){
        $stages = Stage::all();
        return view('teacher.stages',compact('stages'));
    }
    public function stagesSubjects($id){
        $subjects = Subject::where('stage_id',$id)->get();
        return view('teacher.subjects',compact('subjects'));
    }
    public function subjectFiles($id){
        $adminFiles = File::where([
            ['subject_id' , $id],
            ['created_by' , 1]
        ])->get();
        $teacherFiles = File::where([
            ['subject_id' , $id],
            ['created_by', Auth::user()->id]
        ])->get();
        
        return view('teacher.files',compact('adminFiles','teacherFiles'));
    }
}
