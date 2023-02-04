<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = ['doctors_id','specialization','phone','email'];

    public function doctoer(){
        return $this->belongsTo(Doctor::class);
    }

}
