<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type'];

    public function machines()
    {
        return $this->belongsToMany(Machine::class, 'machines_games');
    }
}
