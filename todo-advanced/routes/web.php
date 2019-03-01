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
 * 認証機能
*/
Auth::routes();


Route::group(['middleware' => 'auth'], function() {
  /**
  * TOP画面
  */
  Route::get('/', 'HomeController@index')->name('home');

  /**
  * 各フォルダーのタスク表示
  */
  Route::get('/folders/{folder}/tasks', 'TaskController@index')->name('tasks.index');

  /**
  * フォルダーの新規追加
  */
  Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
  Route::post('/folders/create', 'FolderController@create');

  /**
  * 各フォルダーにタスクの追加
  */
  Route::get('/folders/{folder}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
  Route::post('/folders/{folder}/tasks/create', 'TaskController@create');

  /**
  * タスクの編集
  */
  Route::get('/folders/{folder}/tasks/{task}/edit', 'TaskController@showEditForm')->name('tasks.edit');
  Route::post('/folders/{folder}/tasks/{task}/edit', 'TaskController@edit');
});
