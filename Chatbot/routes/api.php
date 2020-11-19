<?php
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Http\RedirectResponse;

// Route::post('chat','respostaController@getResposta');
// Route::get('chat','respostaController@getAjax');

Route::apiResource('chat','responseChat');
// Route::apiResource('chat','api\responseChat');

Route::apiResource('teste','testeController');



