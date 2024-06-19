<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Party;
use App\Models\Category;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = Candidate::all();
        if (Auth::user()->role == 'admin') {
            return view('dashboard.candidates.index', compact('candidates'));
        } else {
            return view('pages.candidates.index', compact('candidates'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parties = Party::all();
        $categories = Category::all();
        return view('dashboard.candidates.create', compact('parties', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {
        $request->validated();
        $image_name = null;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image_name = $request->name . '_' . time() . '.' . $image->extension();
            $image->move(public_path('assets/images/candidates/'), $image_name);
        }
        Candidate::create([
            'name' => $request->name,
            'photo' => $image_name,
            'party_id' => $request->party_id,
            'category_id' => $request->category_id,
            'vision' => $request->vision,
            'mission' => $request->mission,
        ]);

        return redirect()->route('candidates.index')->with('success', 'Candidate created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        $candidate = Candidate::with(['party', 'category', 'prestations'])->findOrFail($candidate->id);
        if (Auth::user()->role == 'admin') {
            return view('dashboard.candidates.show', compact('candidate'));
        } else {
            return view('pages.candidates.show', compact('candidate'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        $parties = Party::all();
        $categories = Category::all();
        return view('dashboard.candidates.edit', compact('candidate', 'parties', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $request->validated();
        $candidate->fill($request->validated());

        if ($request->hasFile('photo')) {
            $oldImagePath = public_path('assets/images/candidates/' . $candidate->photo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $photo = $request->file('photo');
            $image_name = $candidate->name . '_' . time() . '.' . $photo->extension();
            $photo->move(public_path('assets/images/candidates/'), $image_name);
            $candidate->photo = $image_name;
        }

        $candidate->save();

        return redirect()->route('candidates.index')->with('success', 'Candidate updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        if ($candidate->photo) {
            $imagePath = public_path('assets/images/candidates/' . $candidate->photo);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $candidate->prestations()->delete();
        $candidate->delete();

        return redirect()->route('candidates.index')->with('success', 'Candidate deleted successfully');
    }
}
