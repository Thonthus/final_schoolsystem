<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselorData extends Model
{
    

    use HasFactory;
    protected $primaryKey = 'counselor_id';

    protected $fillable = ['counselor_id', 'counselor_name', 'counselor_tel'];

    public function class_coun()
    {
        return $this->hasOne(ClassroomData::class, 'counselor_id');
    }


}
