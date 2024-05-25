<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\JourneyController;
use App\Models\Journey;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feedbacks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Feedback::create($request->all());
        return redirect()->route('feedbacks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('feedbacks.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('feedbacks.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->update($request->all());
        return redirect()->route('feedbacks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->route('feedbacks.index');
    }



    public function comment()
    {

        $comments = DB::table('feedback')->get();
        return view('admin.components.comments')->with('comments', $comments); // I-return ang view na may data ng journeys

    }



    public function feedback()
    {

        // Ensure that 'journey_id' is passed to the view
        return view('user.components.feedback');
    }


    public function ratingpost(Request $request)
    {
        Log::info('Received data:', $request->all());

        $request->validate([
            'rating' => 'required|integer',
            'comment' => 'required|string',
        ]);

        try {
            // Ensure that 'journey_id' is valid
            $journey = Journey::find($request->input('journey_id'));

            $feedback = new Feedback();
            $feedback->user_id = auth()->id();
            $feedback->rating = $request->input('rating');
            $feedback->comment = $request->input('comment');
            $feedback->save();

            return redirect()->back()->with('success', 'Feedback submitted successfully!');
        } catch (QueryException $e) {
            Log::error('Failed to submit feedback:', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors('Failed to submit feedback: ' . $e->getMessage());
        }
    }

}

