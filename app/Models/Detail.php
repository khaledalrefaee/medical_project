<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id','specialization','phone','email'];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

}
