<?php

namespace App\Http\Controllers\Trainee;

use App\Models\Topics;
use App\Models\Subjects;
use Illuminate\Http\Request;
use App\Models\TrineePrograms;
use App\Models\TrainingModules;
use App\Models\TrainingPrograms;
use App\Models\TraineeEnrolledPrograms;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ModuleWiseController extends Controller
{
    public function index(){
        $modules = TrainingModules::with('courses')->get();

        return view('trainee.module-wise',['modules'=>$modules]);
    }

    public function getRelatedPrograms($courseId)
{
    // Fetch related programs for the given course ID
    $relatedPrograms = TrainingPrograms::where('course_id', $courseId)->get();

    return response()->json([
        'status' => 'success',
        'programs' => $relatedPrograms
    ]);
}
public function getProgramDetails(Request $request)
    {
        $programId = $request->input('program_id');

        // Fetch the program details based on the ID
        //$programs = TrineePrograms::with(['module', 'course', 'program','programVcDates'])
        $programs = TrineePrograms::with(['module', 'course', 'program','programVcDates'])
        ->where('program_id', $programId)
        ->get();;
//print_r($programs);
        if ($programs) {
            $html = view('partials.program-details', ['programs'=>$programs])->render();

            return response()->json([
                'status' => 'success',
                'html' => $html
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Program not found.'
            ]);
        }
    }

    public function getAllSubjects(Request $request){
        try {
            // Get the course ID from the request
            $course_id = $request->input('course_id');

            // Validate the input
            if (empty($course_id)) {
                return response()->json(['error' => 'Course ID is required'], 400);
            }

            // Query the database
            $subjects = Subjects::where('course_id', $course_id)
                                 ->orderBy('sl_no', 'asc')
                                 ->get();


            // Check if programs were found
            if ($subjects->isEmpty()) {
                return response()->json(['message' => 'No subjects found for this course.'], 404);
            }

            // Return a view or JSON response
            return view('partials.subject_list', compact('subjects'))->render(); // Ensure this view exists
        } catch (\Throwable $e) {
            // Log the exception and return an error response
            \Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching subjects'], 500);

    }
    }

    public function getAllTopics(Request $request){
        try {
            // Get the course ID from the request
            $subject_id = $request->input('subject_id');

            // Validate the input
            if (empty($subject_id)) {
                return response()->json(['error' => 'Subject ID is required'], 400);
            }

            // Query the database
            $topics = Topics::where('subject_id', $subject_id)->get();

            // Check if programs were found
            if ($topics->isEmpty()) {
                return response()->json(['message' => 'No Toics found for this course.'], 404);
            }

            // Return a view or JSON response
            return view('partials.topic_list', compact('topics'))->render(); // Ensure this view exists
        } catch (\Throwable $e) {
            // Log the exception and return an error response
            \Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching Topics'], 500);

    }
    }
    public function requestToEnroll(Request $request){
        try {
            // Get the course ID from the request
            $program_id = $request->input('program_id');

            // Validate the input
            if (empty($program_id)) {
                return response()->json(['error' => 'program_id ID is required'], 400);
            }

            $userId = Auth::id();


            // Check if already enrolled
            $alreadyEnrolled = TraineeEnrolledPrograms::where('user_id', $userId)
                ->where('program_id', $program_id)
                ->exists();

            if ($alreadyEnrolled) {
                return response()->json(['success' => false,'message' => 'You are already enrolled in this program'], 409);
            }

            // Enroll the user
            // TraineeEnrolledPrograms::create([
            //     'user_id' => $userId,
            //     'program_id' => $program_id,
            //     'status' => 1,
            // ]);
            $enroll = new TraineeEnrolledPrograms();
            $enroll->user_id = $userId;
            $enroll->program_id = $program_id;
            $enroll->status = 2;
            $enroll->save();

            return response()->json([ 'success' => true,'message' => 'Request Send successfully'], 200);


        } catch (\Throwable $e) {
                // Log the exception and return an error response
                \Log::error($e->getMessage());
                return response()->json(['success' => false,'error' => 'An error occurred while process request'], 500);

        }

    }
}
