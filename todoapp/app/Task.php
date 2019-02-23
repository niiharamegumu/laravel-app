<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
      'name' => 'required|max:255',
    );
}
