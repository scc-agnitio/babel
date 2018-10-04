<?php

use App\Language;
use Illuminate\Database\Seeder;

/**
 * Class LanguageSeeder
 */
class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = collect(json_decode(file_get_contents(database_path('/data/languages.json')), true));
        $languages->each(function($language) {
            Language::create([
                'code' => $language['code'],
                'name' => $language['name'],
                'locale' => $language['locale'],
            ]);
        });
    }
}
