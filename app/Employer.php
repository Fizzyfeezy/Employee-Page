<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $fillable = [
        'user_id', 'salary', 'classification', 'status','status_time',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
