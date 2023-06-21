<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Survey;
use Illuminate\Support\Str;
class SurveyController extends Controller
{
    public function index()
    {
        $survey = Survey::all();
        return view('fe.survey',compact('survey'));
    }
    public function submit(Request $request)
    {
        // Validate the survey submission data
        $validatedData = $request->validate([
            'user_choice' => 'required',
            'user_provide' => 'required',
        ]);
    
        // Process the survey submission and save it to the database
        $survey = new Survey();
        $survey->user_chosen = $validatedData['user_choice'];
        $survey->user_provide = $validatedData['user_provide'];
    
        // Generate a unique promotion code
        $promotionCode = Str::random(10);
        $survey->code = $promotionCode;
    
        // Save the survey to the database
        $survey->save();
    
        // Optionally, you can send the promotion code to the user via email or any other notification mechanism
    
        // Return a response with the generated promotion code
        return view('fe.confirmation', ['promotionCode' => $promotionCode]);
    }
    
    public function admin()
    {
        $survey = Survey::all();
        return view('survey.index',compact('survey'));
    }
    public function create()
    {
        $survey = Survey::all();
        return view('survey.create',compact('survey'));
    }
   public function store(Request $request)
{
    $request->validate([
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $survey = Survey::create([
            'photo' => $imageName,
        ]);

        return redirect('/survey')->with('success', 'Survey photo created successfully.');
    }

    return redirect()->back()->with('error', 'Error creating survey photo.');
}
public function destroy($id)
{
    $survey = Survey::findOrFail($id);
    $survey->delete();

    return redirect('/survey')->with('success', 'Survey photo deleted successfully.');
}
}