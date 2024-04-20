<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Define table name (optional)
    protected $table = 'comments';

    // Define primary key (optional)
    protected $primaryKey = 'id';

    // Define timestamps (optional)
    public $timestamps = true;

    public $fillable = [
        'body',
        'user_id',
        'post_id',
    ];

    public $hidden = [
        'id',
        'user_id',
        'post_id',
    ];

    // comment belongs to a post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // comment belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
