<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jokee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['status','update_at'];
}
