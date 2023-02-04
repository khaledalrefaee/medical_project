<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waiting extends Model
{
    use HasFactory;

    protected $fillable =['name','gender','address','birthday','doctor_id'];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
