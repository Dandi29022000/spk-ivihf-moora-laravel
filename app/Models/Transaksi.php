<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    public $timestamps= false;
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'tanggal',
        'nama', 
        'keterangan',
        'id_posisi',
        'id_penilai',
        'id_pelamar'
    ];

    public function posisi(){
        return $this->belongsTo(PosisiPekerjaan::class, 'id_posisi', 'id');
    }

    public function penilai(){
        return $this->belongsTo(DataPeran::class, 'id_penilai', 'id');
    }

    public function pelamar(){
        return $this->belongsTo(DataPelamar::class, 'id_pelamar', 'id');
    }
}
