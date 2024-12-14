<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'date_maintenance',
        'description',
        'prochaine_maintenance',
    ];

    /**
     * Relation belongsTo avec la machine.
     */
    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}