<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    use HasFactory;

    public function photography(){
        return $this->belongsTo(photography::class);
    }
    public function orderedphoto(){
        return $this->hasMany(orderedphoto::class);
    }
}
