<?php

namespace App;

/**
 * Class StaticTranslationRepo
 *
 * @package App
 */
class StaticTranslationRepo implements TranslationRepository
{

    /**
     *
     */
    public function getAll()
    {
        return collect([

        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllPaginated()
    {
        return collect([]);
    }
}
