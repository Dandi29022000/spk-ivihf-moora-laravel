<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hfltsLinguistik extends Model
{
    use HasFactory;
    protected $table = 'hflts_linguistiks';
    public $timestamps= false;
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','id_linguistik','A','B','C','D'];

    public function hflts_linguistik(){
        return $this->belongsTo(Linguistik::class, 'id_linguistik', 'id');
    }
}
