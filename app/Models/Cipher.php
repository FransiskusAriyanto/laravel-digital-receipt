<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cipher extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function kuitansi()
    {
        return $this->belongsTo(Kuitansi::class);
    }
}
