<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;
    protected $table = "students_table";
    protected $primaryKey = "id";
    protected $fillable = [
        "first_name","last_name","email"
    ];
}
