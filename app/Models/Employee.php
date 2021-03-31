<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    //if we have different table name than plural of the model ie. Employees in this case than we have to use 
    //this table variable ie. pre defined and assign it name of the table used for this model
    protected $table = 'tbl_employees';

    //similarly if we have a primmary key other than id column in above table than we need to use 
    // primaryKey variable in same way
    protected $primaryKey = "emp_id";

    // by default primary kkey id in laravel is integer type if we have differrentt datatype for this primary key
    //then we have to let laravel know the datatype for pk
    protected $keyType = 'string';


    //By default laravel two timestamp columns in database that are created_at and updated_at 
    // if wwe want to update the name of this column names then 
    //const CREATED_AT = 'creation_date';
    //const UPDATED_AT = 'updated_date';


    //if we dont want timestaps columns in our databse table than 
    public $timestamps = false;// and comment above two linnes off code and also remove timestamp code from migration file


}
