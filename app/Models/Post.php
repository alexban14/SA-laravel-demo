<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Define table name (optional)
    protected $table = 'posts';

    // Define primary key (optional)
    protected $primaryKey = 'id';

    // Define timestamps (optional)
    public $timestamps = true;

    protected $fillable = [
        "title",
        "body",
        "image",
    ];

    // post has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // comment belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
