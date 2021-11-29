<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $table = 'mutasi';
    protected $fillable = [
        'user_id', 'unit_baru', 'status', 'jabatan_id', 'unit_lama', 'jabatan_id_lama'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function jabatan()
    {
        return $this->hasOne(Jabatan::class, 'id', 'jabatan_id');
    }

    public function jabatan_lamaa()
    {
        return $this->hasOne(Jabatan::class, 'id', 'jabatan_id_lama');
    }

    public function unit_baruu()
    {
        return $this->hasOne(Unit::class, 'id', 'unit_baru');
    }

    public function unit_lamaa()
    {
        return $this->hasOne(Unit::class, 'id', 'unit_lama');
    }
}
