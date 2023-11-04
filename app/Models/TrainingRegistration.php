<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingRegistration extends Model
{
    use HasFactory;
public function training(){

        return $this->belongsTo('App\Models\Training');
    }

    public function user(){

        return $this->belongsTo('App\Models\User');
    }
}
