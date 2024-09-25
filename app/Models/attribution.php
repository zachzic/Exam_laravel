<?php

namespace App\Models;
use App\Models\User;
use App\Models\groupe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attribution extends Model
{
    public function User()
    {
        return $this -> belongsTo(User::class);
    }

    public function groupe()
    {
        return $this -> belongsTo(groupe::class);
    }
}

