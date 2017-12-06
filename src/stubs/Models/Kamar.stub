<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kamar extends Model
{
    protected $table = 'yankes_kamar';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('tahun', 'bulan', 'tanggal', 'count', 'via', 'user_id', 'city_id');

    

    public function getCity()
    {
        return $this->hasOne('App\EpormasCity', 'id', 'city_id');
    }
}
