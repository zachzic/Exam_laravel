<?php

namespace App\Models;
use App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    public function admin()
    {
        return $this->belongsTo(admin::class);
    }
    public function programmes()
    {
        return $this->belongsToMany(Programme::class, 'partenaire_programme');
    }
}
