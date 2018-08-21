<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Validator\QuestionsValidator;

class QuestionsController extends Controller
{
    public function askQuestion(Request $request)
    {
        try{
            QuestionsValidator::validateQuestion($request->all());
            $question = new \App\AdQuestion();
            $question->question = $request->question;
            $question->ad_id = $request->ad_id;
            $question->client_id = $request->client_id;
            $question->save();
            return back();
        }catch(\App\Validator\ValidationException $e){
            return back()->withErrors($e->getValidator())
                        ->withInput();
        }
    }

    public function answerQuestion(Request $request)
    {
        try{
            QuestionsValidator::validateAnswer($request->all());
            $question = \App\AdQuestion::find($request->question_id);
            $question->answer = $request->answer;
            $question->save();
            return back();
        }catch(\App\Validator\ValidationException $e){
            return back()->withErrors($e->getValidator())
                        ->withInput();
        }
    }
}
?>
