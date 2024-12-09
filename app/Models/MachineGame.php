<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MachineGame extends Model
{
    use HasFactory;

    protected $table = 'machines_games';

    protected $fillable = ['machine_id', 'game_id'];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
