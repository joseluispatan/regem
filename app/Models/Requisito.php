<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    public function scopeCurrentUser($query)
    {
        if (auth()->user()->role->name == 'admin') {
            return $query;
        }
        return $query->where('users_id', auth()->user()->id);
 	}
    //use HasFactory;
}
