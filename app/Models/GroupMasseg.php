<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMasseg extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'message_text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
