<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $table = 'berkas';
    protected $fillable = [
        'user_id', 'mutasi_id', 'nomor_berkas', 'nama_berkas', 'status_berkas'
    ];


    public function user() {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function mutasi() {
        return $this->belongsTo(Mutasi::class, 'mutasi_id','id');
    }
}
