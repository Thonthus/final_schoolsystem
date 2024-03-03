<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'user_id'; 

    protected $fillable = [
        'username', 
        'password',
        'role', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function studentDataByStudentId()
{
    return $this->hasOne(StudentData::class, 'student_id', 'username');
}
    
}
