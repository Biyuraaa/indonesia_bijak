<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = Candidate::all();
        return view('pages.candidates.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        // Mengambil kandidat beserta relasinya
        $candidate = Candidate::with(['party', 'category', 'election', 'prestations'])->findOrFail($candidate->id);

        // Mengirim data ke view
        return view('pages.candidates.show', compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        //
    }

    public function filter(Request $request)
    {
        $categoryId = $request->input('category_id');
        $electionId = $request->input('election_id');

        if (!$categoryId || !$electionId) {
            return response()->json(['error' => 'category_id and election_id are required'], 400);
        }

        $candidates = Candidate::where('category_id', $categoryId)
            ->where('election_id', $electionId)
            ->get();

        return response()->json($candidates);
    }
}
