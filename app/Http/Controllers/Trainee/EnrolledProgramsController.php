<?php

namespace App\Http\Controllers\Trainee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TraineeEnrolledPrograms;
use Illuminate\Support\Facades\Auth;

class EnrolledProgramsController extends Controller
{
    public function getEnrolledPrograms(){
         $userId = Auth::id();
         $programs = TraineeEnrolledPrograms::with('program')
                     ->where('user_id', $userId)
                     ->get();

         return view('trainee.enrolled-programs',['programs'=>$programs]);
    }
}
