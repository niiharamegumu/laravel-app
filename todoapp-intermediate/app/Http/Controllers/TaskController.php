<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use App\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{

  public function __construct(TaskRepository $tasks) {
    $this->middleware('auth');
    $this->tasks = $tasks;
  }

    public function index ( Request $request ) {
      return view('tasks.index', [
        'tasks' => $this->tasks->forUser($request->user()),
      ]);
    }

    public function add ( Request $request ) {
      $this->validate($request, Task::$rules);
      $request->user()->tasks()->create([
        'name' => $request->name,
      ]);
      return redirect('/tasks');
    }

    public function destroy(Request $request, Task $task){
      $this->authorize('destroy', $task);
      $task->delete();
      return redirect('/tasks');
    }
}
