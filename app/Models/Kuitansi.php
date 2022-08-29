<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuitansi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function cipher()
    {
        return $this->hasOne(Cipher::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
