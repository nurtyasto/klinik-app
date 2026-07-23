<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Polyclinic extends Model
{
    protected $fillable = ['name', 'cost', 'description'];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}