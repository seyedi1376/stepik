<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['title', 'code', 'score' , 'price' , 'description' ,'showToUser' ,'groupId' , 'courseLevel'];
    public function groups() {

        return $this->belongsToMany('App\Group');
    }
    public function category() {

        return $this->belongsTo('App\Category' , 'categoryId');
    }
    public function tags() {

        return $this->belongsToMany('App\Tag');
    }

}
