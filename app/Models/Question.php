<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = [
        'test_id',
        'question',
        'a',
        'b',
        'c',
        'd',
        'correct'
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

}