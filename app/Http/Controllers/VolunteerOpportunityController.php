<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VolunteerOpportunity;
use Auth;

class VolunteerOpportunityController extends Controller
{
    // Show the form for creating a new volunteer opportunity
    public function create()
    {
        return view('volunteer_opportunities.create');
    }

    // Store a newly created volunteer opportunity in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
        ]);

        $opportunity = new VolunteerOpportunity();
        $opportunity->nonprofit_id = Auth::user()->nonprofit->id; // Assuming a logged-in user can only create opportunities for their nonprofit
        $opportunity->title = $request->title;
        $opportunity->description = $request->description;
        $opportunity->date = $request->date;
        $opportunity->location = $request->location;
        $opportunity->save();

        return redirect()->route('opportunity.index')->with('success', 'Volunteer opportunity created successfully.');
    }

    // Show the form for editing the specified volunteer opportunity
    public function edit($id)
    {
        $opportunity = VolunteerOpportunity::findOrFail($id);
        return view('volunteer_opportunities.edit', compact('opportunity'));
    }

    // Update the specified volunteer opportunity in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required',
        ]);

        $opportunity = VolunteerOpportunity::findOrFail($id);
        $opportunity->title = $request->title;
        $opportunity->description = $request->description;
        $opportunity->date = $request->date;
        $opportunity->location = $request->location;
        $opportunity->is_active = $request->is_active == 'on' ? 1 : 0;
        $opportunity->save();

        return redirect()->route('opportunity.index', $opportunity->id)->with('success', 'Volunteer opportunity updated successfully.');
    }

    // Display the specified volunteer opportunity
    public function show($id)
    {
        $opportunity = VolunteerOpportunity::findOrFail($id);
        return view('volunteer_opportunities.show', compact('opportunity'));
    }

    // Display a listing of the volunteer opportunities
    public function index()
    {
        $opportunities = VolunteerOpportunity::all();
        return view('volunteer_opportunities.index', compact('opportunities'));
    }

    public function destroy(Request $request)
    {
        $opportunity = VolunteerOpportunity::findOrFail($request->id);
        $opportunity->delete();

        return redirect()->route('opportunity.index')->with('success', 'Volunteer opportunity deleted successfully.');
    }
}
