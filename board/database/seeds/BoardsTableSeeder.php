<?php

use Illuminate\Database\Seeder;
use App\Board;

class BoardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $board = new Board;
      $param = [
        'name' => 'taro',
        'comment' => 'これは、テストデータです。',
      ];
      $board->fill($param)->save();
    }
}
