<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Test;
class QuizController extends Controller
{
    //
    public function getQuiz()
    {
        $response = Http::get('https://opentdb.com/api.php?amount=10');
        $jsonData = $response->json();
        $data=$jsonData['results'];

        return view('Quiz.quiz',[
            'hotel' => $data,
          ]);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $user = auth()->user(); 
        $result=unserialize($input['test']);
        $test=new Test();
        $test->user_id=$user->id;
        $test->save();
        $i=1;
        foreach($result as $val)
        {
            $quiz= new Quiz();

            if(isset($input[$i]))
            {
                if($input[$i]==$val['correct_answer'])
                {
                    $quiz->user_id=$user->id;
                    $quiz->test_id=$test->id;
                    $quiz->question= $val['question'];
                    $quiz->correct_answer= $val['correct_answer'];
                    $quiz->answer= $input[$i];
                    $quiz->score= 1;
                    $quiz->save();
                }
                else
                {
                    $quiz->user_id=$user->id;
                    $quiz->test_id=$test->id;
                    $quiz->question= $val['question'];
                    $quiz->correct_answer= $val['correct_answer'];
                    $quiz->answer= $input[$i];
                    $quiz->score= 0;
                    $quiz->save();
                }
            }
            $i++;
        }    
        return view('Quiz.success');
    }
}