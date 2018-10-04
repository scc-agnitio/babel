<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Platform;
use App\Term;
use App\Translation;

Route::post('/terms/import', 'TermImportController@store');


Route::get('/', 'TranslaterController@index');
Route::get('/translate', 'TranslaterController@show');
Route::get('/translations', 'TranslationsController@index');
// Auth::routes();

Route::get('test', function () {

    $platformCode = "ios";
    $language = strtolower("Spanish");
    $fileExtension = ".txt";
    $fileName = $platformCode ."_" .  $language . $fileExtension;
    $file = fopen($fileName, "w") or die("Unable to open file!");

    // dd($fileName);

    $translations = Translation::where('language_code', 'de')->get();
    $spanishTranlations = collect([]);


    $translations->each(function($translation) use ($spanishTranlations) {
        $spanishTranlations[] = [
            'key' => $translation->term->key,
            'text' => $translation->text,
        ];


    });

    foreach($spanishTranlations as $line){
        $data = $line["key"] . " = " .$line['text'] . "<br/>";
        echo($data);
    }

    //dd($spanishTranlations);





});


Route::get('/home', function() {
    return view('home');
});

