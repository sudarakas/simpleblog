<?php

namespace App;


class Post extends Model
{
    public function comments(){

        return $this->hasMany(Comment::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

    public static function archive(){
        return static::selectRaw('year(created_at) year,monthname(created_at) month,COUNT(*) published')->groupBy('year','month')->get()->toArray();
    }
}
