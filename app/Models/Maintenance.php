<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_id', 'date_maintenance', 'description', 'prochaine_maintenance',
    ];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}
