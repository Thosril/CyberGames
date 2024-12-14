<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Machine extends Model
{
    use HasFactory;

    protected $fillable = [
        'processeur',
        'memoire',
        'systeme_exploitation',
        'purchase_date',
        'install_games',
        'status',
        'last_maintenance',
    ];

    /**
     * Relation hasMany avec les maintenances.
     */
    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
}
