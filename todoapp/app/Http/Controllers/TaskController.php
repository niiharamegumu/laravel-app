<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index ( Request $request ) {
      $tasks = Task::orderBy('created_at', 'asc')->get();
      return view('todo.tasks', ['tasks' => $tasks]);
    }

    public function add ( Request $request ) {
      $this->validate($request, Task::$rules);

      $task = new Task;
      $form = $request->all();
      unset($form['_token']);
      $task->fill($form)->save();
      return redirect('/');
    }

    public function del ( Request $request ) {
      $id = $request->id;
      Task::findOrFail($id)->delete();

      return redirect('/');
    }
}
