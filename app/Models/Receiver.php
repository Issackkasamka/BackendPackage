<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    use HasFactory;


    protected $table='receivers';

    public function Sender(){
        return $this->belongTo(Receiver::class);
    }

    public function Package(){
        return $this->hasMany(Package::class);
    }
}
