<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinics extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name','description'
    ];

    public function doctor(){
        return $this->hasMany(Doctor::class,'clinic_id');
    }
}
