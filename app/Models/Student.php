<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory;

    //below is the accessor function
    // get<column_name>Attribute($value) 
    // $value is indicating each value of each object

    public function getEmailAttribute($value)
    {
        return strtoupper($value);
    }

    //if we want to convert formate of timestamp created at

    public function getCreatedAtAttribute($value)
    {
       return date("y-m-d h:i:s",strtotime($value));
    }

    //mutator in case of mutators we will use set and we used get in accessoor
    public function setPhoneNumberAttribute($value)
    {
        $this->attributes["phone_number"]="+91".$value;
    }

    //one to one relationship 
    //to do so we first need to define relationship in model
    public function branch()
    {
        return $this->hasOne(Branch::class);
    }

    //one to many
    public function courses()
    {
        return $this->hasMany(course::class);
    }
}
