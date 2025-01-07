<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Topics;
use App\Models\Subjects;
use Illuminate\Http\Request;
use App\Models\TrineePrograms;
use App\Models\TrainingPrograms;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // public function index(){
    //     return view('panel.dashboard');
    // }

    public function dashboard(){
        //dd(123);
        if(Auth::user()->role == 'admin'){

            return view('admin.dashboard');
        }
        else if(Auth::user()->role == 'trainee'){
            return view('trainee.dashboard');
        }
        else if(Auth::user()->role == 'cd'){
            return view('courseDirector.dashboard');
        }
        else if(Auth::user()->role == 'deo'){
            return view('deo.dashboard');
        }
        else{
            return view('monitorCell.dashboard');
        }
    }

    public function getRelatedPrograms($courseId)
    {
        // Fetch related programs for the given course ID
        $relatedPrograms = TrineePrograms::with(['module', 'course', 'program','programVcDates'])
                                             ->where('course_id', $courseId)
                                             ->where('status', 3)
                                             ->get();

        return response()->json([
            'status' => 'success',
            'programs' => $relatedPrograms
        ]);
    }

    // public function getProgramDetail(Request $request){

    //     $programId = $request->input('program_id');

    //     $programs = TrineePrograms::with(['module', 'course', 'program','programVcDates'])
    //     ->where('program_id', $programId)
    //     ->where('status', 3)
    //     ->get();

    //     if($programs){
    //         return response()->json([
    //             'status' => 'success',
    //             'programs' => $programs
    //         ]);
    //     }else{
    //         return response()->json([
    //             'status' => 'error',
    //             'programs' => []
    //         ]);
    //     }
    // }

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

    public function getSearchSubject(Request $request)
{
    // Input validation
    $query = $request->input('courseTxt');
    if (!$query) {
        return response()->json(['message' => 'Search text is required'], 400);
    }

    // Enable query log for debugging
    \Illuminate\Support\Facades\DB::flushQueryLog(); // Clear previous logs
    \Illuminate\Support\Facades\DB::enableQueryLog();

    // Query logic: search in subject_name and topic_name
    $results = Subjects::with(['topics', 'course.program' => function ($query) {
        $query->where('status', 3); // Filter active programs
    }])
    ->where('subject_name', 'LIKE', "%{$query}%") // Search in subject_name
    ->orWhereHas('topics', function ($q) use ($query) { // Search in topic_name
        $q->where('topic_name', 'LIKE', "%{$query}%");
    })
    ->whereHas('course.program', function ($q) { // Ensure the course is linked to an active program
        $q->where('status', 1);
    })
    ->get();

    // Log the query for debugging
    $queryLog = \Illuminate\Support\Facades\DB::getQueryLog();

    // Debugging: Print query log and results
    if ($results->isEmpty()) {
        return response()->json([
            'message' => 'No results found',
            'query_log' => $queryLog,
        ], 404);
    }

    // Success response
    return response()->json([
        'data' => $results,
        'query_log' => $queryLog,
    ]);
}
  public function loginToenroll(Request $request){

    $request->session()->forget('selected_program_id');

    $request->session()->put('selected_program_id', $request->input('program_id'));

    return response()->json([
        'status' => 'success'

    ]);
  }
}
