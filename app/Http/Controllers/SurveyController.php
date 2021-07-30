<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\SurveyController;

class SurveyController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

    public function home(Request $request) 
    { 
      $surveys = Survey::get();
      
      return view('home', compact('surveys'));
    }

  # view survey publicly and complete survey
  public function view_survey(Survey $survey) 
  { 
     
    $survey->option_name = unserialize($survey->option_name);
   // dd($survey);
    return view('survey.view', compact('survey'));
  }

   # Show page to create new survey
   public function new_survey() 
   {
    
     return view('survey.new');
   }

   public function create(Request $request, Survey $survey) 
   {
     $arr = $request->all();
     // $request->all()['user_id'] = Auth::id();
     $arr['user_id'] = Auth::id();

    // dd($arr);

     $surveyItem = $survey->create($arr);
     return Redirect::to("/survey/{$surveyItem->id}");
   }


    # retrieve detail page and add questions here
  public function detail_survey(Survey $survey) 
  {
     
    $survey->load('questions.user');
    //dd($survey);
    return view('survey.detail', compact('survey'));
  }

  public function edit(Survey $survey) 
  {
    return view('survey.edit', compact('survey'));
  }

  # edit survey
  public function update(Request $request, Survey $survey) 
  {
    $survey->update($request->only(['title', 'description']));
  //  return redirect()->action('SurveyController@detail_survey', [$survey->id]);
    return redirect()->action(
      [SurveyController::class, 'detail_survey'], [$survey->id]
  );
  }



  # view submitted answers from current logged in user
  public function view_survey_answers(Survey $survey) 
  {
    //dd($survey);
    $survey->load('user.questions.answers');
   //$survey->load('user.questions.answers');
   
    // return view('survey.detail', compact('survey'));
    // return $survey;
   // dd($survey);
    return view('answer.view', compact('survey'));
  }

    // TODO: Make sure user deleting survey
  // has authority to
  public function delete_survey(Survey $survey)
  {
    $survey->delete();
    return redirect('');
  }

  
}
