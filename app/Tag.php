<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=['title'];
    public function tasks() {

        return $this->belongsToMany('App\Task');
    }
    public function lessons() {

        return $this->belongsToMany('App\Lesson');
    }
}
