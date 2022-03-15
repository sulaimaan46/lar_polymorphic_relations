<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function comment(){

        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags(){

        return $this->morphToMany(Tag::class, 'taggable');
    }
}
