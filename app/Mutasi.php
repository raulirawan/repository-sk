<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $table = 'mutasi';
    protected $fillable = [
        'user_id', 'unit_lama', 'unit_baru', 'status', 'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function unit_lamaa()
    {
        return $this->hasOne(Unit::class, 'id', 'unit_lama');
    }

    public function unit_baruu()
    {
        return $this->hasOne(Unit::class, 'id', 'unit_baru');
    }
}
