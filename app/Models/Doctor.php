<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Doctor extends Model
{
    use HasFactory;
    use HasApiTokens;
    use SoftDeletes;

    protected $fillable =[
        'name' ,'password' ,'email','clinic_id'
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
    public function waiting(){
        return $this->hasMany(Waiting::class);
    }


    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
}
