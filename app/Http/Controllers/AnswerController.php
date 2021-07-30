<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

    public function store(Request $request, Survey $survey) 
    {
      // remove the token

     
      $arr = $request->except('_token');
      foreach ($arr as $key => $value) {
        $newAnswer = new Answer();
        if (! is_array( $value )) {
          $newValue = $value['answer'];
        } else {
          $newValue = json_encode($value['answer']);
        }
        $newAnswer->answer = $newValue;
        $newAnswer->question_id = $key;
        $newAnswer->user_id = Auth::id();
        $newAnswer->survey_id = $survey->id;
  
        $newAnswer->save();
  
        $answerArray[] = $newAnswer;
      };

   //dd($answerArray);
     // return redirect()->action('SurveyController@view_survey_answers', [$survey->id]);
     return redirect()->action(
      [SurveyController::class, 'view_survey_answers'], [$survey->id]
  );
   
   
    }
}
