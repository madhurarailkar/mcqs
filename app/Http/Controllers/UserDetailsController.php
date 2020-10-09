<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class UserDetailsController extends Controller
{
    public function index(Request $request)
    {

        // $data = User::select(DB::raw('name,SUM(score) as score'))
        //             ->join('tests', 'users.id', '=', 'tests.user_id')
        //             ->join('quizzes', 'tests.id', '=', 'quizzes.test_id')
        //             ->groupBy('tests.id')
        //             ->paginate(1);
        // return view('user',[
        //     'userlist' => $data,
        //   ]);

          /////////////////////////


          $search =  $request->input('q');
          if($search!=""){
            $users = User::select(DB::raw('name,SUM(score) as score'))
            ->join('tests', 'users.id', '=', 'tests.user_id')
            ->join('quizzes', 'tests.id', '=', 'quizzes.test_id')
            ->groupBy('tests.id')
            ->paginate(25);
              $users->appends(['q' => $search]);
          }
          else{
            $users = User::select(DB::raw('name,SUM(score) as score'))
            ->join('tests', 'users.id', '=', 'tests.user_id')
            ->join('quizzes', 'tests.id', '=', 'quizzes.test_id')
            ->where('name','like', '%' .$search . '%')
            ->groupBy('tests.id')
            ->paginate(25);
          }
          return view('user',[
            'userlist' => $users,
          ]);
          //
    }
    public function search(Request $request)
    {       
        
        $search =  $request->input('q');


        $users = User::select(DB::raw('name,SUM(score) as score'))
                    ->join('tests', 'users.id', '=', 'tests.user_id')
                    ->join('quizzes', 'tests.id', '=', 'quizzes.test_id')
                    ->where('name','like', '%' .$search . '%')
                    ->groupBy('tests.id')
                    ->paginate(25);
                    $users->appends(['q' => $search]);

        return view('user',[
            'userlist' => $users,
          ]);
    }
    public function sort($type)
    {       

      $users = User::select(DB::raw('name,SUM(score) as score'))
            ->join('tests', 'users.id', '=', 'tests.user_id')
            ->join('quizzes', 'tests.id', '=', 'quizzes.test_id')
            ->groupBy('tests.id')
            ->orderBy(DB::raw('SUM(score)'), $type)
            ->paginate(25);
            return view('user',[
              'userlist' => $users,
            ]);
    }
}
