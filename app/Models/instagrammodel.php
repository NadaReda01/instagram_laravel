<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instagrammodel extends Model
{
    use HasFactory;
    protected $table = "post";
    protected $fillable = ['caption','image'];
    public $timestamps = false;
}
