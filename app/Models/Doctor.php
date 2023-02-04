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

    public function clinics(){
        return $this->belongsTo(Clinics::class);
    }
}
