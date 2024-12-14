<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Package extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'duration', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_packages')
                    ->withPivot(['reservation_date', 'duration', 'status']);
    }
}
