<?php

namespace App\Http\Controllers\Trainee;

use auth;
use App\Models\Topics;
use App\Models\PracticeTest;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use App\Models\UserPracticeTest;
use App\Http\Controllers\Controller;

class PracticeTestController extends Controller
{
    public function index(Request $request){

        $tests = PracticeTest::with('programs','subject')
                 ->where('program_id',$request->program_id)
                 ->get();

        $userId = auth()->id();

        //check exam status already given or not
        $examStatus = UserPracticeTest::where('user_id', $userId)
                      ->where('status', 1)
                      ->pluck('id') // Get the IDs of tests already taken
                      ->toArray();

        // Check if the user has completed all topics for the subject
        $allCompleted = UserProgress::where('user_id', $userId)
            ->where('subject_id', $request->subject_id)
            ->where('status', 1)
            ->count() === Topics::where('subject_id', $request->subject_id)->count();


        return view('trainee.praticeTestList',compact('tests','allCompleted', 'examStatus'));
    }

    public function startTest(Request $request){

    }
}
