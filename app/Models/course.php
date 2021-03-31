<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    //one to many inverse
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
