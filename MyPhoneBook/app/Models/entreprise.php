<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rue',
        'code_postal',
        'ville',
        'telephone_portable',
        'email',
    ];


    public function collaborateur () {
        return $this->hasMany(collaborateur::class);
    }
}
