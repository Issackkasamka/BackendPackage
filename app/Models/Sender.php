<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    use HasFactory;

    protected $table='senders';

    public function Receivers(){
        return $this->hasMany(Receiver::class);
    }

    public function Package(){
        return $this->hasMany(Package::class);
    }

}
