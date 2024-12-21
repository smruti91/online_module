<?php

namespace App\Http\Controllers\CourseDirector;

use App\Http\Controllers\Controller;
use App\Models\TrineePrograms;
use App\Models\programsVC;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class ApproveProgramController extends Controller
{
    public function index(){
        $programs = TrineePrograms::with(['module', 'course', 'program'])->get();

        return view('courseDirector.approveProgram',['programs'=>$programs]);
    }

    public function getPrograms(Request $request){
        $programs = TrineePrograms::with(['module', 'course', 'program'])
                    ->where('id',$request->input('programId'))
                    ->get();
        return response()->json($programs);
    }

    public function approveProgram(Request $request)
        {
            try {
                // Parse Start and End Dates
                $startDate = Carbon::createFromFormat('d-m-Y', $request->input('start_date'));
                $endDate = Carbon::createFromFormat('d-m-Y', $request->input('end_date'));
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'errors' => ['Invalid Start Date or End Date format. Please use dd-mm-yyyy.']
                ], 422);
            }

            // Validation Rules
            $validator = Validator::make($request->all(), [
                'vc1_date' => "required|date_format:d-m-Y|after_or_equal:{$startDate->format('d-m-Y')}|before_or_equal:{$endDate->format('d-m-Y')}",
                'vc2_date' => "nullable|date_format:d-m-Y|after_or_equal:{$startDate->format('d-m-Y')}|before_or_equal:{$endDate->format('d-m-Y')}",
                'exam_date' => "required|date_format:d-m-Y|after_or_equal:{$startDate->format('d-m-Y')}|before_or_equal:{$endDate->format('d-m-Y')}",
            ], [
                'vc1_date.after_or_equal' => 'VC-1 Date must be on or after the Start Date.',
                'vc1_date.before_or_equal' => 'VC-1 Date must be on or before the End Date.',
                'vc2_date.after_or_equal' => 'VC-2 Date must be on or after the Start Date.',
                'vc2_date.before_or_equal' => 'VC-2 Date must be on or before the End Date.',
                'exam_date.after_or_equal' => 'Exam Date must be on or after the Start Date.',
                'exam_date.before_or_equal' => 'Exam Date must be on or before the End Date.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                ], 422);
            }

            // Convert dates to Y-m-d before saving
            $examDate = Carbon::createFromFormat('d-m-Y', $request->input('exam_date'))->format('Y-m-d');
            $vc1Date = Carbon::createFromFormat('d-m-Y', $request->input('vc1_date'))->format('Y-m-d');
            $vc2Date = $request->filled('vc2_date')
                ? Carbon::createFromFormat('d-m-Y', $request->input('vc2_date'))->format('Y-m-d')
                : null;

            // Fetch and update program
            $program = TrineePrograms::find($request->input('programId'));
            if ($program) {
                // Update Exam Date and Status
                $program->exam_date = $examDate;
                $program->status = 3;
                $program->save();

                // Save VC-1 Date
                $vc1 = new programsVC();
                $vc1->program_id = $program->id;
                $vc1->vc_date = $vc1Date;
                $vc1->description = 'VC-1 Date';
                $vc1->save();

                // Save VC-2 Date if provided
                if ($vc2Date) {
                    $vc2 = new programsVC();
                    $vc2->program_id = $program->id;
                    $vc2->vc_date = $vc2Date;
                    $vc2->description = 'VC-2 Date';
                    $vc2->save();
                }

                // Success Response
                return response()->json([
                    'success' => true,
                    'message' => 'Program approved successfully!',
                ]);
            }

            return response()->json([
                'success' => false,
                'errors' => ['Program not found.'],
            ], 404);
        }

}
