<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    use HasFactory;

//fillable y hiden

protected $fillable = [
    'phrase',
    'author',
    'image'
];

protected $hidden = [
    'created_at',
    'updated_at'
];
}
