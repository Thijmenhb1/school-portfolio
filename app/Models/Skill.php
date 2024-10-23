<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Skill extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable =[
        'title',
        'created_at',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
