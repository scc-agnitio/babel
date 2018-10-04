<?php

namespace App;

interface TranslationRepository
{
    public function getAll();
    public function getAllPaginated();
}