<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartyRequest;
use App\Http\Requests\UpdatePartyRequest;
use Illuminate\Support\Facades\Auth;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $parties = Party::all();
        if (Auth::user()->role == 'admin') {
            return view('dashboard.parties.index', compact('parties'));
        } else {
            return view('pages.parties.index', compact('parties'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.parties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartyRequest $request)
    {
        $request->validated();
        $image_name = null;
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $image_name = $request->name . '_' . time() . '.' . $image->extension();
            $image->move(public_path('assets/images/parties/'), $image_name);
        }
        Party::create([
            'name' => $request->name,
            'logo' => $image_name,
            'history' => $request->history,
            'vision' => $request->vision,
            'mission' => $request->mission,
        ]);

        return redirect()->route('parties.index')->with('success', 'Party created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Party $party)
    {
        //
        $party = Party::with(['candidates', 'programs'])->findOrFail($party->id);
        return view('pages.parties.show', compact('party'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Party $party)
    {
        return view('dashboard.parties.edit', compact('party'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartyRequest $request, Party $party)
    {
        $request->validated();
        $image_name = $party->logo;
        if ($request->hasFile('logo')) {
            $oldImagePath = public_path('assets/images/parties/' . $party->logo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $image = $request->file('logo');
            $image_name = $request->name . '_' . time() . '.' . $image->extension();
            $image->move(public_path('assets/images/parties/'), $image_name);
        }
        $party->update([
            'name' => $request->name,
            'logo' => $image_name,
            'history' => $request->history,
            'vision' => $request->vision,
            'mission' => $request->mission,
        ]);

        return redirect()->route('parties.index')->with('success', 'Party updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Party $party)
    {
        if ($party->logo) {
            $imagePath = public_path('assets/images/parties/' . $party->logo);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $party->delete();
        return redirect()->route('parties.index')->with('success', 'Party deleted successfully');
    }
}
