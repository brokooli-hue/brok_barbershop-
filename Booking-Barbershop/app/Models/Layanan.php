<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'tabel_layanan';
    protected $fillable = ['nama_layanan','harga','lama_layanan'];

    public function barber()
    {
        return $this->belongsTo(Barber::class, 'barber_id');
    }
}
