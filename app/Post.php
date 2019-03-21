<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'body'
    ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }


     public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query,$filters){


        if($month = $filters['month']){

            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filters['year']){

            $query->whereYear('created_at', Carbon::parse($year)->year);
        }

    }
}
