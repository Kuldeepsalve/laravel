<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;


    //for inverse one to one relationship
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    
}
