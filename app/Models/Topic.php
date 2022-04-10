<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'categoryID',
        'name',
        'status'
    ];

    public function Category(){
        return $this->belongsTo(Category::class,'categoryID');
       }

    public function Posts(){
        return $this->hasMany(Post::class,'topicID');
    }   
}
