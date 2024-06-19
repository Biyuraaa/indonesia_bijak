<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Party;
use App\Models\Candidate;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function parties()
    {
        $parties = Party::all();
        return view('pages.parties.index', compact('parties'));
    }

    public function party(Party $party)
    {
        return view('pages.parties.show', compact('party'));
    }

    public function candidates()
    {
        $candidates = Candidate::all();
        return view('pages.candidates.index', compact('candidates'));
    }

    public function candidate(Candidate $candidate)
    {
        return view('pages.candidates.show', compact('candidate'));
    }
}
