<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $fillable =['doctor_id','time','date','name','phone','address','birthday','diagnosis','status'];


    public function user(){
            return $this->belongsTo(User::class, );
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
