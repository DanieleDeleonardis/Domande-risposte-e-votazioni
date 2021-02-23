<?php

namespace App\Models;

use Parsedown;
use App\Models\User;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //converte i dati in html
    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    //associamo i commenti ad una domanda, e una domanda ha più commenti
    public static function boot()
    {
        parent::boot();

        static::created(function($answer){

            $answer->question->increment('answers_count');

        });
    }
}