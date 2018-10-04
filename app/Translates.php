<?php

namespace App;

interface Translates
{
    public function getTranslation(string $text, $language);
}