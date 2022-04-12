<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'name',
        'desc',
        'status'
    ];

    public function Topics(){
        return $this->hasMany(Topic::class,'categoryID');
       }
}