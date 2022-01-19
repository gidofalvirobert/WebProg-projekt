<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticated;

class user extends Authenticated
{
    use HasFactory,HasApiTokens;
    protected $table = "users";
    protected $fillable = ['username','password','tel','country','locality','adress'];



    public function prole(){
        return $this->hasOne(prole::class);
    }
    public function photography(){
        return $this->hasMany(photography::class);
    }
}
