<?php

namespace App\Console\Commands;

use App\Language;
use App\LanguageTag;
use Illuminate\Console\Command;

class ImportLanguages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'agnitio:import-languages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import language files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $languages = collect(json_decode(file_get_contents(database_path('/data/languages.json')), true));
        $language_tags = collect(json_decode(file_get_contents(database_path('/data/language_codes.json')), true));

        // dd($languages->first());
        // dd($language_codes->first());

        // $languages->each(function($language) {
        //     Language::create([
        //         'code' => $language['alpha2'],
        //         'name' => $language['English'],
        //     ]);
        // });

        $language_tags->each(function($code) {
            // dd($code);
            LanguageTag::create([
                'tag' => $code['lang'],
                'language_code' => $code['langType'],
                'territory' => $code['territory'],
            ]);
        });

        // dd(LanguageCode::count());
    }
}
