<?php

use App\Task;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $numArray = range(1, 3);
      foreach ( $numArray as $num ) {
        $task = new Task;
        $param = [
          'folder_id' => 1,
           'title' => "サンプルタスク {$num}",
           'status' => $num,
           'due_date' => Carbon::now()->addDay($num),
        ];
        $task->fill($param)->save();
      }
    }
}
