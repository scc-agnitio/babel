<?php

namespace App;

class Translator
{
    /**
     * @var Translates
     */
    private $translateService;

    public function __construct(Translates $translateService)
    {
        $this->translateService = $translateService;
    }

    public function getTranslation(string $term, $language)
    {
        return $this->translateService->getTranslation($term, $language);
    }
}
