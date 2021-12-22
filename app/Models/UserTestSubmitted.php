<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTestSubmitted extends Model
{
    use HasFactory;
    protected $fillable = [
        user_id,
        test_id,
        rate,
    ];
}
