<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = ['patient_id', 'polyclinic_id', 'date', 'complaint', 'diagnosis', 'action'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function polyclinic()
    {
        return $this->belongsTo(Polyclinic::class);
    }
}