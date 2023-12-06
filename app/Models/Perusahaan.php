<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = "perusahaan";
    protected $guarded = [];
    protected $primaryKey = 'id_perusahaan';

    function lowongan(){
        return $this->hasMany(Lowongan::class,'id_perusahaan');
    }
}

