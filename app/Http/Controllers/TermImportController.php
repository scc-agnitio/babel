<?php

namespace App\Http\Controllers;

use App\Platform;
use App\Term;
use Illuminate\Http\Request;

class TermImportController extends Controller
{
    public function store(Request $request)
    {
        $termsToImport = collect($request->get('terms'));
        $platform = Platform::where('key', $request->get('platform'))->first();

        $termsToImport->each(function ($term) use ($platform) {
            $platform->terms()->create($term);
        });

        return response()->json($platform->terms, 200);
    }
}
