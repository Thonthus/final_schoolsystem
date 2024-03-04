<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentData extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_id';

    protected $fillable = ['student_id', 'class_id', 'number', 'student_img', 'firstname', 'lastname', 'nickname', 'birthdate', 'gender', 'personal_id', 'address', 'phone', 'email'];


    public function classroomData()
    {
        return $this->belongsTo(ClassroomData::class, 'class_id', 'class_id');
    }
    public function checked_time()
    {
        return $this->hasMany(CheckedData::class, 'student_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'username', 'student_id');
    }
}
