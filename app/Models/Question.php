<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'test_id',
        'answer_1',
        'answer_2',
        'answer_3',
        'answer_4',
        /*'correct_answer',*/
    ];


}
