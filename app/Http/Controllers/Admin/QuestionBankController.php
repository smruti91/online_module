<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subjects;
use App\Models\CourseMudels;
use Illuminate\Http\Request;
use App\Models\PracticeQuestions;
use App\Http\Controllers\Controller;
use App\Models\PracticeQuestionOptions;

class QuestionBankController extends Controller
{
   public function getQuestions(){
     $courses = CourseMudels::all();
     $questions = PracticeQuestions::with('options')->get();
      return view('admin.questionBank',compact('courses','questions'));
   }

   public function getSubjects(Request $request)
{

    $request->validate([
        'course_id' => 'required', // Ensure the course_id exists in the courses table
    ]);

    // **Step 2: Fetch Subjects Based on Course ID**
    $subjects = Subjects::where('course_id', $request->course_id)->get();

    // **Step 3: Return JSON Response**
    return response()->json($subjects);
}

public function store(Request $request)
    {
        // **Step 1: Validate the Request**
        $request->validate([
            'question_title' => 'required|string',
            'option_title_1' => 'required|string',
            'option_title_2' => 'required|string',
            'option_title_3' => 'required|string',
            'option_title_4' => 'required|string',
            'write_option' => 'required|integer|between:1,4',
            'course_id' => 'required|integer', // Assuming course_id is passed in the request
            'subject_id' => 'required|integer', // Assuming subject_id is passed in the request
        ]);

        // **Step 2: Store the Question Title in the Questions Table**
        $question = PracticeQuestions::create([
            'question_title' => $request->question_title,
            'course_id' => $request->course_id,
            'subject_id' => $request->subject_id,
        ]);
       //print_r($question);
        // **Step 3: Store the Options and Answer in the Options Table**
        $options = [
            ['option_title' => $request->option_title_1, 'option_label'=>'A', 'is_correct' => $request->write_option == 1],
            ['option_title' => $request->option_title_2, 'option_label'=>'B', 'is_correct' => $request->write_option == 2],
            ['option_title' => $request->option_title_3, 'option_label'=>'C', 'is_correct' => $request->write_option == 3],
            ['option_title' => $request->option_title_4, 'option_label'=>'D', 'is_correct' => $request->write_option == 4],
        ];
       // print_r($options);exit;
        foreach ($options as $option) {
            PracticeQuestionOptions::create([
                'question_id' => $question->id,
                'option_label' => $option['option_label'],
                'option_value' => $option['option_title'],
                'is_correct' => $option['is_correct'],
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Question and options created successfully',
        ]);
    }
}
