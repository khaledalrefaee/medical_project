<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable =[
        'name' , 'clinic_id'
    ];

    public function clinic(){
        return $this->belongsTo(Clinics::class);
    }

    public function detail(){
        return $this->hasOne(Detail::class,'doctor_id');
    }

    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
}
