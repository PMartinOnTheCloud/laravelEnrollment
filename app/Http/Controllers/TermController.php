<?php

namespace App\Http\Controllers;
use App\Models\Term;

class TermController extends Controller
{
    public function getTerms() {
        return response()->json(Term::all());
    }
}
