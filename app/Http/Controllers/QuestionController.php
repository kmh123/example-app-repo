<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function store(Request $request, Survey $survey) 
    {
      $arr = $request->all();
      $arr['user_id'] = Auth::id();
      $arr['option_name']=array( 'php', 'java','js','css','jquery');//checkbox
     //$arr['option_name']=array( 'moring', 'night','evening');//radio
       // dd($arr);
      $survey->questions()->create($arr);

      return back();
    }


    public function edit(Question $question) 
    {
     // dd($question);
      return view('question.edit', compact('question'));
    }

    public function update(Request $request, Question $question) 
    {

      $question->update($request->all());
      //return redirect()->action('SurveyController@detail_survey', [$question->survey_id]);

      return redirect()->action(
        [SurveyController::class, 'detail_survey'], [$question->survey_id]
    );
     
    }
}
