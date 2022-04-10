<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'memberID',
        'topicID',
        'title',
        'body',
        'status',
    ];

    public function Member(){
        return $this->belongsTo(Member::class,'memberID');
    }
    public function Topic(){
        return $this->belongsTo(Topic::class,'topicID');
    }
    public function Complaints(){
        return $this->hasMany(Complaint::class,'postID');
    }
}
