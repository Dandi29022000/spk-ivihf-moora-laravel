<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alternative extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','code', 'name',];
    protected $dates = ['deleted_at'];

    public static function getIdfromName($name)
    { 
        $data = Alternative::where('name', '=', $name)->first();
        return $data->id;
    }
}
