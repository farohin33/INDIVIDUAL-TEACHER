<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    protected $fillable = [
        'topic_id',
        'title',
        'content'
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

}