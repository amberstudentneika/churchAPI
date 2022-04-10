<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable=[
        'memberID',
        'topic',
        'message',
        'status',
        'admin'
    ];

    public function Member(){
        return $this->belongsTo(Member::class,'memberID');
       }
}
