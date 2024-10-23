<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable =[
        'title',
        'image',
        'description',
        'created_at',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
