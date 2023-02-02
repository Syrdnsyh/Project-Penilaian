<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'Nilais';
    protected $guarded = ['id'];

    public function Mengajar(){
        return $this->belongsTo(Mengajar::class,'mengajar_id','id');
    }
    public function Siswa(){
        return $this->belongsTo(Siswa::class,'siswa_id','id');
    }
}
