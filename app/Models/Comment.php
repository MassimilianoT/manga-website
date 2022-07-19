<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function manga(){
        return $this->belongsTo(Manga::class);
    }

    public function updateReviews(){
        $tmp = $this->manga->rating;
        $n_comments = $this->manga->comments()->count();
        $rating = $this->rating;
        $this->manga->rating = ($tmp*($n_comments - 1) + $rating)/$n_comments;
        $this->manga->save();
    }

    
}
