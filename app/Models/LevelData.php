<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelData extends Model
{
    use HasFactory;

    protected $primaryKey = 'level_id';


    public function classroom()
    {
        return $this->hasMany(ClassroomData::class, 'level_id');
    }
}
