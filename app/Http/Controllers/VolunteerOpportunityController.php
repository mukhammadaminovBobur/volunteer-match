<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use App\Models\VolunteerOpportunity;
use Illuminate\Support\Facades\Auth;

class VolunteerOpportunityController extends Controller
{
    // Display a listing of the volunteer opportunities
    public function index()
    {
        $paginate = 5;
        //search for opportunities
        if (Auth::user()->role == 'volunteer') {
            $opportunities = VolunteerOpportunity::where('is_active', 1)->orderby('created_at', 'desc')->paginate($paginate);
        }elseif(Auth::user()->role == 'nonprofit') {
            if (request()->has('search') && !empty(request('search'))){
                $search = request('search');
                $opportunities = VolunteerOpportunity::where('nonprofit_id', Auth::user()->nonprofit->id)
                    ->where(function($query) use ($search) {
                        $query->where('title', 'like', '%'.$search.'%')
                            ->orWhere('description', 'like', '%'.$search.'%');
                    })
                    ->orderby('created_at', 'desc')->paginate($paginate);
            } else{
                $opportunities = VolunteerOpportunity::where('nonprofit_id', Auth::user()->nonprofit->id)->orderby('created_at', 'desc')->paginate($paginate);
            }
        }
        return view('volunteer_opportunities.index', compact('opportunities'));
    }

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

        //if request has another request to create another opportunity
        if ($request->has('create_another')) {
            return redirect()->route('opportunity.create')->with('success', 'Volunteer opportunity created successfully.');
        }

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

    public function destroy(Request $request)
    {
        $opportunity = VolunteerOpportunity::findOrFail($request->id);
        $opportunity->delete();

        return redirect()->route('opportunity.index')->with('success', 'Volunteer opportunity deleted successfully.');
    }
}
