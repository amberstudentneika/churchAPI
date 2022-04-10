<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable=[
        'memberID',
        'postID',
        'message',
        'status',
        'handledByAdmin',
    ];

    public function Member(){
        return $this->belongsTo(Member::class,'memberID');
       }
    public function Post(){
        return $this->belongsTo(Post::class,'postID');
       }
}
