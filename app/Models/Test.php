<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
    ];

    public function questions()
    {
        return $this->hasMany(TestQuestion::class);
    }

    public function answers()
    {
        return $this->hasManyThrough(
            TestAnswer::class,
            TestQuestion::class,
            'test_id',
            'question_id',
        );
    }
}
