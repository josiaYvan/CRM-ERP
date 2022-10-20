<?php

namespace App\Models;

use App\Models\Poste;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'telephone', 'email', 'date_naissance', 'poste_id', 'image'];

    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }
    public function tache()
    {
        return $this->hasMany(Tache::class);
    }
}
