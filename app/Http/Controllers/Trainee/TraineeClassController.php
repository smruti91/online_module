<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Models\Subjects;
use App\Models\UserProgress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TraineeClassController extends Controller
{
   public function handleRedirect(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'id' => 'required|integer',
        ]);

        $type = $request->input('type');
        $id = $request->input('id');

        $user_id = Auth::id(); // Get the logged-in user ID
        $program_id = 1; // Example program ID, replace as needed

        // Fetch subjects with topics
        $subjects = Subjects::with('topics')->orderBy('sl_no', 'ASC')->get();

        // Fetch progress
        $progress = UserProgress::where('user_id', $user_id)
            ->where('program_id', $program_id)
            ->where('status', 1)
            ->get()
            ->keyBy('topic_id');

        switch ($type) {
            case 'class':

                return view('trainee.classRoom',compact('subjects', 'progress', 'program_id'));
            case 'course':
                // Redirect to course details page
                //return redirect()->route('course.details', ['course_id' => $id]);
            case 'subject':
                // Redirect to subject details page
               // return redirect()->route('subject.details', ['subject_id' => $id]);
            default:
                abort(404, 'Invalid type');
        }
    }


}
