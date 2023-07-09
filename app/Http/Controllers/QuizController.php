<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizQuestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }

    public function addQestions(Request $request)
    {


      $validated=  $request->validate([
            'subject_id'=>"required|exists:subjects,id",
            'question'=>'required|array',
            'question.*.name'=>"required",
            'question.*.type'=>"required",
            'question.*.option1.name'=>"required",
            'question.*.option2.name'=>"required",
            'question.*.option3.name'=>"required",
            'question.*.option4.name'=>"required",
            'question.*.option1.checked'=>"sometimes",
            'question.*.option2.checked'=>"sometimes",
            'question.*.option3.checked'=>"sometimes",
            'question.*.option4.checked'=>"sometimes",

        ]);
      $questions=[];

      $subjectId=$validated["subject_id"];
      foreach ($validated["question"] as $item){
         $question['name']= $item["name"][''];
         $question["type"]=$item["type"][''];

         $option1["name"]=$item['option1']["name"][''];
          $option1["is_correct"]=false;
         if (array_key_exists('checked',$item['option1'])){
             $option1["is_correct"]=true;
         }
         $option2["name"]=$item['option2']["name"][''];
          $option2["is_correct"]=false;
          if (array_key_exists('checked',$item['option2'])){
              $option2["is_correct"]=true;
          }
         $option3["name"]=$item['option3']["name"][''];
          $option3["is_correct"]=false;
          if (array_key_exists('checked',$item['option3'])){
              $option3["is_correct"]=true;
          }
         $option4["name"]=$item['option4']["name"][''];
          $option4["is_correct"]=false;
          if (array_key_exists('checked',$item['option4'])){
              $option4["is_correct"]=true;
          }
          $question["options"]=[$option1,$option2,$option3,$option4];
         array_push($questions,$question);
      }

          foreach ($questions as $quizquestion){

            $created=  QuizQuestions::query()->create(
                [
                    'subject_id'=>$subjectId,
                    "name"=>$quizquestion['name'],
                    'type'=>$quizquestion['type']
                ]
            );
            foreach ($quizquestion['options'] as $option){
                $created->options()->create($option);
            }

          }

          return response()->json(['success','questions created !']);
    }
}
