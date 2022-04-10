<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=[
        'memberID',
        'postID',
        'body',
        'status'
    ];
    
    public function Member(){
        return $this->belongsTo(Member::class,'memberID');
       }
    public function Post(){
        return $this->belongsTo(Post::class,'postID');
       }
}
