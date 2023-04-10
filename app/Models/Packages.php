<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;

    protected $table='packages';

    public function Sender(){
        return $this->belongTo(Sender::class);
    }

    public function Receiver(){
        return $this->belongTo(Receiver::class);
    }
}
