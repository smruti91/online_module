<?php

namespace App\Http\Controllers\Trainee;

use App\Models\UserProgress;
use Illuminate\Http\Request;
use App\Models\TraineeQueryRise;
use App\Http\Controllers\Controller;

class TraineeQueryController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'topicId' => 'required',
            'program_id' => 'required',
        ]);

        $queries = TraineeQueryRise::with(['techQuery', 'topic'])
                   ->where('topic_id', $request->topicId)
                   ->where('program_id', $request->program_id)
                   ->get();

        return response()->json([
                    'status' => 'success',
                    'data' => $queries,
                ]);
    }
    public function store(Request $request){
        $request->validate([
            'queryType' => 'required|string|max:255',
            'currentTopicId' => 'required',
        ]);

        $query = TraineeQueryRise::create([
            'topic_id' => $request->currentTopicId,
            'program_id'=>$request->program_id,
            'user_id' => auth()->id(),
            'query_type' => $request->queryType,
            'techQueryId'=>$request->techQueryType,
            'query_desc' => $request->queryDesc ?? null,
            'status' => '1'
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Query raised successfully!',
            'data' => $query,
        ]);
    }

    public function saveProgress(Request $request)
    {
        $validated = $request->validate([
            'topic_id' => 'required|integer',
            'subject_id' => 'required|integer',
            'program_id' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        try {
            $userId = auth()->id(); // Get the authenticated user's ID

            // Update or create the progress record
            UserProgress::create(
                [
                    'user_id' => $userId,
                    'topic_id' => $validated['topic_id'],
                    'subject_id' => $validated['subject_id'],
                    'program_id' => $validated['program_id'],
                    'status' => $validated['status']
                ]

            );

            return response()->json(['status' => 'success', 'message' => 'Progress saved successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to save progress.', 'error' => $e->getMessage()]);
        }
    }
}
