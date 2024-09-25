<?php

namespace App\Models;
use App\Models\groupe;
use App\Models\module;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class acces extends Model
{
    public function module()
    {
        return $this->belongsTo(module::class);
    }
    public function groupe()
    {
        return $this->belongsTo(groupe::class);
    }

}
