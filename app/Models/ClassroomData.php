<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomData extends Model
{
    use HasFactory;

    protected $primaryKey = 'class_id' ;

    protected $fillable = ['class_id', 'class_name', 'counselor_id'];

    public function students()
    {
        return $this->hasMany(StudentData::class, 'class_id');
    }

    public function level(){
        return $this->belongsTo(LevelData::class, 'level_id');
    }

 
}
