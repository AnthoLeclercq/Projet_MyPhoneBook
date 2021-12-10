<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Email;
use RuntimeException;

class collaborateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'civilite',
        'nom',
        'prenom',
        'rue',
        'code_postal',
        'ville',
        'telephone_portable',
        'email',
        'entreprise_id' 
    ];
    
    public function entreprise () {
        return $this->belongsTo(entreprise::class);
    }
}
