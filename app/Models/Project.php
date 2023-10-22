<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $primarykey = ' id';
    protected $fillable = [
        'projectname',
        'academicyear',
        'gradelevel',
        'class',
        'description',
        'projectmembers',
        'projectadvisors',
        'abstract',
        'code',
        'approval',
        'video'
    ];
    protected $casts = [
        'projectmembers' => 'array',
        'projectadvisors' => 'array'
    ];
}
