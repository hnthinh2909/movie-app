<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index');

//Route::view('/movie', 'show');

Route::get('/movie', function() {
   return view('show');
});