<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    public function orderedphoto(){
        return $this->hasMany(orderedphoto::class);
    }

    public function photography(){
        return $this->hasMany(photography::class);
    }
}
