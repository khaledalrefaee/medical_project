<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waiting extends Model
{
    use HasFactory;

    protected $fillable =['name','gender_id','address','birthday','doctor_id','status'];

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
