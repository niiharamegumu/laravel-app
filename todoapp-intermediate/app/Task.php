<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name'];
    public static $rules = [
      'name' => 'required|max:255',
    ];

    public function user () {
      return $this->belongsTo('App\User');
    }
}
