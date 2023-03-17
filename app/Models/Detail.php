<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['doctor_id','specialization','phone','email'];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

}
