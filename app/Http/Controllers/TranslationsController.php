<?php

namespace App\Http\Controllers;

use App\Translation;
use Illuminate\Http\Request;

class TranslationsController extends Controller
{
    // public function __construct(TranslationsService $service)
    // {
    // }
    public function index()
    {
        $translations = Translation::all(); // []; //$this->translationService->getAllPaginated();

        return view('translations.index', compact('translations'));
    }
}
