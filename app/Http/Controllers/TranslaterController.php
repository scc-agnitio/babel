<?php

namespace App\Http\Controllers;

use App\Translator;
use Illuminate\Http\Request;

class TranslaterController extends Controller
{
    /**
     * @var Translator
     */
    private $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function show(Request $request)
    {
        return $this->translator->getTranslation($request->get('text'), $request->get('lang', 'en'));
    }
}
