<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
 protected $table = 'tabel_booking';

    protected $fillable = [
        'user_id',
        'no_hp',
        'layanan_id',
        'barber_id',
        'tanggal_booking',
        'jam_booking',
        'status_booking'
    ];

    public function layanan() {
        return $this->belongsTo(Layanan::class);
    }

    public function barber() {
        return $this->belongsTo(Barber::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
