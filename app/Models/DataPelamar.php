<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPelamar extends Model
{
    use HasFactory;

    protected $table = 'data_pelamars';
    public $timestamps= false;
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','id_user','status'];

    public function data_pelamar(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
