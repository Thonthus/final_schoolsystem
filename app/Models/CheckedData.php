<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckedData extends Model
{
    use HasFactory;

    protected $primaryKey = 'checked_id' ;
    protected $fillable = ['student_id', 'date', 'time_checked_out', 'time_checked_in', 'status'];

    public function student() {
        return $this->belongsTo(StudentData::class, 'student_id');
    }

    
}
