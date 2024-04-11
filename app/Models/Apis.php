<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apis extends Model
{
    use HasFactory;

    protected $table = 'apis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name','email','password'
    ];
}
