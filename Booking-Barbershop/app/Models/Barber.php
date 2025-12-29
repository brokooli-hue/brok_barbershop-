<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    protected $table = 'tabel_barber';
    protected $fillable = ['nama_barber','gambar_barber','kuota'];

    public function layanan()
    {
        return $this->hasMany(Layanan::class, 'barber_id');
    }
}