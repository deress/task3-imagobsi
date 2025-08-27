<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Feedback::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeedbackRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'comment' => 'required|string|max:500',
        ]);

        $feedback = Feedback::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Feedback submitted successfully',
            'data' => $feedback
        ]);
    }
}
