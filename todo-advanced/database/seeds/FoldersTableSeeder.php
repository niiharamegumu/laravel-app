<?php

use Illuminate\Database\Seeder;
use App\Folder;
use App\User;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::first();
      $titles = ['プライベート', '仕事', '旅行'];
      foreach ( $titles as $title ) {
        $folder = new Folder;
        $param = [
          'title'   => $title,
          'user_id' => $user->id,
        ];
        $folder->fill($param)->save();
      }
    }
}
