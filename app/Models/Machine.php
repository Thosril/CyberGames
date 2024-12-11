<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;  // Ajoute cette ligne

class Machine extends Model
{
    use HasFactory;

    protected $fillable = [
        'processeur', 'memoire', 'systeme_exploitation',
        'purchase_date', 'install_games', 'status', 'last_maintenance',
    ];

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'machines_games');
    }
}
