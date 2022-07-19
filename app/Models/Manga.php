<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function chapters(){
        return $this->hasMany(Chapter::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function prefbyusers(){
        return $this->belongsToMany(User::class);
    }
}
    