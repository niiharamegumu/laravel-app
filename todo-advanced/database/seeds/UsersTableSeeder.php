<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User;
      $param = [
        'name' => 'test',
        'email' => 'dummy@email.com',
        'password' => password_hash('test1234',PASSWORD_DEFAULT),
      ];
      $user->fill($param)->save();
    }
}
