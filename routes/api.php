<?php

Route::apiResource('question', 'QuestionController');
Route::apiResource('category', 'CategoryController');
Route::apiResource('question/{question}/reply', 'ReplyController');
Route::post('like/{reply}', 'LikesController@likeIt');
Route::delete('like/{reply}', 'LikesController@unLikeIt');