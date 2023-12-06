<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = "lowongan";
    protected $guarded = [];
    protected $primaryKey = 'id_loker';

    function perusahaan(){
        return $this->belongsTo(Perusahaan::class,'id_perusahaan');
    }
}