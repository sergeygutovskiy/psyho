<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'fio',
        'email',
        'age',
        'sex',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function tests()
    {
        return $this->hasMany(TestSession::class);
    }

    public function finished_tests()
    {
        return $this->tests()->where('is_finished', true);
    }

    public function questions()
    {
        return $this->belongsToMany(
            QuestionnaireQuestion::class,
            'users_questionnaire_questions',
            'user_id',
            'question_id',
        );
    }
}
