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

Route::get('/', 'IntroController@start')->name('home')->middleware('guest');

Route::prefix('intro')->group(function() {
    Route::post('/line-save', 'IntroController@lineSave')->name('intro.line.save');
    Route::get('/title', 'IntroController@addTitle')->name('intro.title');
    Route::post('/title-save', 'IntroController@titleSave')->name('intro.title.save');
    Route::get('/author', 'IntroController@addAuthor')->name('intro.author');
    Route::post('/author-save', 'IntroController@authorSave')->name('intro.author.save');
    Route::get('/signup', 'IntroController@signup')->name('intro.signup');
    Route::post('/signup-save', 'IntroController@signupSave')->name('intro.signup.save');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('dash');
Route::prefix('story')->group(function() {
    Route::get('/top/{period?}', 'StoryController@topRated')->name('story.top');
    Route::get('/view/{story}', 'StoryController@view')->name('story.view');
    Route::get('/random/{rating?}', 'StoryController@random')->name('story.random');
    Route::get('/newlines/{story}', 'StoryController@newLines')->name('story.newlines');
    Route::get('/upvote/{story}', 'StoryController@upvote')->name('story.upvote');
    Route::get('/downvote/{story}', 'StoryController@downvote')->name('story.downvote');
    Route::middleware('auth')->group(function () {
        Route::get('/create', 'StoryController@create')->name('story.create');
        Route::post('/save', 'StoryController@save')->name('story.save');
        Route::post('/add/{story}', 'StoryController@addLine')->name('story.add');
    });
});

Route::prefix('search')->group(function() {
    Route::get('/', 'SearchController@index')->name('search');
    Route::get('/results', 'SearchController@results')->name('search.results');
});

//define all new routes before this point as {comic} will resolve everything before additional routes
Route::get('/{story}', 'StoryController@redirect')->name('story.shortcut');