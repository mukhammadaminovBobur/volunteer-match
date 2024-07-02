<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nonprofit;
use Auth;

class NonprofitController extends Controller
{
    // Show the form for creating a new nonprofit
    public function create()
    {
        return view('nonprofits.create');
    }

    // Store a newly created nonprofit in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
        ]);

        $nonprofit = new Nonprofit();
        $nonprofit->user_id = Auth::user()->id;
        $nonprofit->name = $request->name;
        $nonprofit->description = $request->description;
        $nonprofit->location = $request->location;
        $nonprofit->save();

        return redirect()->route('nonprofit.show', $nonprofit->id)->with('success', 'Nonprofit created successfully.');
    }

    // Show the form for editing the specified nonprofit
    public function edit($id)
    {
        $nonprofit = Nonprofit::findOrFail($id);
        $countryPhonesJson = "https://country.io/phone.json";
        $countryPhones = json_decode(file_get_contents($countryPhonesJson), true);
        $countryNamesJson = "https://country.io/names.json";
        $countryNames = json_decode(file_get_contents($countryNamesJson), true);
        return view('nonprofits.edit', compact('nonprofit', 'countryPhones', 'countryNames'));
    }

    // Update the specified nonprofit in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'website' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $nonprofit = Nonprofit::findOrFail($id);
        $nonprofit->name = $request->name;
        $nonprofit->description = $request->description;
        $nonprofit->website = $request->website;
        $nonprofit->phone = $request->phone;
        $nonprofit->address = $request->address;
        $nonprofit->save();

        return redirect()->route('nonprofit.show', $nonprofit->id)->with('success', 'Nonprofit updated successfully.');
    }

    // Display the specified nonprofit
    public function show($id)
    {
        $nonprofit = Nonprofit::findOrFail($id);
        return view('nonprofits.show', compact('nonprofit'));
    }
}
