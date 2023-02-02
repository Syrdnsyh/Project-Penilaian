<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    use HasFactory;

    protected $table = 'Mengajars';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function Guru(){
        return $this->belongsTo(Guru::class,'guru_id','id');
    }
    public function Mapel(){
        return $this->belongsTo(Mapel::class,'mapel_id','id');
    }
    public function Kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id','id');
    }
}
