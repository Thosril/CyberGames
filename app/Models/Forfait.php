<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forfait extends Model
{
    protected $fillable = ['nom', 'prix', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


}
