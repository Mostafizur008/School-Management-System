<?php

namespace App\Models\Setup\Syllabus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'file_path',
    ];
}
