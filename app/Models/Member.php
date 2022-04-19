<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $hidden = ['email','password'];

    protected $key = ['id'];

    protected $fillable=[
        'name',
        'email',
        'password',
        'role',
        'gender',
        'image',
        'totalPosts',
        'status',
    ];

    public function Posts(){
        return $this->hasMany(Post::class,'memberID');
    }
    public function Likes(){
        return $this->hasMany(like::class,'memberID');
    }
    public function Comments(){
        return $this->hasMany(Comment::class,'memberID');
    }
    public function Complaints(){
        return $this->hasMany(Complaint::class,'memberID');
    }
    public function Announcements(){
        return $this->hasMany(Announcement::class,'memberID');
    }

}
