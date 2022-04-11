<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'test_id',
        'result_id',
        'is_finished',
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function answers()
    {
        return $this->belongsToMany(
            TestAnswer::class,
            'users_test_answers',
            'test_session_id',
            'answer_id',
        );
    }

    public function result()
    {
        return $this->belongsTo(
            TestResult::class,
            'result_id',
        );
    }
}
