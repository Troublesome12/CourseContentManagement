<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model{

    protected $fillable = [
        'title', 'user_id', 'course_id'
    ];
	
	public function user() {
        return $this->belongsTo('App\User');
    }

    public function course() {
        return $this->belongsTo('App\Course');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
