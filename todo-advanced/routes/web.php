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
/**
 * TOP画面
*/
Route::get('/', 'HomeController@index')->name('home');

/**
 * 認証機能
*/
Auth::routes();

/**
 * 各フォルダーのタスク表示
*/
Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');

/**
 * フォルダーの新規追加
*/
Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
Route::post('/folders/create', 'FolderController@create');

/**
 * 各フォルダーにタスクの追加
*/
Route::get('/folders/{id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
Route::post('/folders/{id}/tasks/create', 'TaskController@create');

/**
 * タスクの編集
*/
Route::get('/folders/{id}/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
Route::post('/folders/{id}/tasks/{task_id}/edit', 'TaskController@edit');
