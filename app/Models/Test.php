<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];

    public function question()
    {
        return $this->hasMany(Question::class, 'test_id', 'id');
    }
    public function user_test()
    {
        return $this->hasMany(UserTest::class, 'test_id', 'id');
    }
    /*public function users()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }*/
}
