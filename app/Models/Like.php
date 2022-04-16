<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable=[
        'memberID',
        'postID',
        'like',
        'status'
    ];

    public function Member(){
        return $this->belongsTo(Member::class,'memberID');
       }
    public function Post(){
        return $this->belongsTo(Post::class,'postID');
       }
}
