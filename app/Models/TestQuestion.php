<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    use HasFactory;

    public function answers()
    {
        return $this->hasMany(TestAnswer::class, 'question_id');
    }
}
