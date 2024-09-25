<?php

namespace App\Models;
use App\Models\Partenaire;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    public function Partenaire()
    {
        return $this->belongsToMany(Partenaire::class, 'partenaire_programme');
    }
}
