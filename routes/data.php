<?php
Route::get('projects', 'ProjectController@getProjects');
Route::get('project/{project}/progress', 'ProjectController@getProjectProgress');
Route::get('tasks/{project}', 'TaskController@getTasks');
Route::post('tasks/{project}', 'TaskController@storeTask');
Route::match(['put', 'patch'], 'task/{task}', 'TaskController@updateTask');
Route::delete('task/{task}', 'TaskController@destroyTask');
Route::match(['put', 'patch'], 'task/{task}/completed', 'TaskController@markCompleted');
Route::match(['put', 'patch'], 'task/{task}/incomplete', 'TaskController@markIncomplete');
