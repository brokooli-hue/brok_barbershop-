<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    protected $table = 'tabel_barber';
    protected $fillable = ['nama_barber', 'gambar_barber', 'kuota', 'kuota_reset'];

    public function layanan()
    {
        return $this->hasMany(Layanan::class, 'barber_id');
    }



    public function cekDanResetKuota()
    {
        // jika belum pernah reset
        if ($this->kuota_reset === null) {
            $this->kuota = 6;
            $this->kuota_reset = now('asia/makassar');
            $this->save();
            return;
        }

        // cek apakah sudah ganti hari
        if (
            Carbon::parse($this->kuota_reset)->isYesterday() ||
            Carbon::parse($this->kuota_reset)->lt(now('asia/makassar')->startOfDay())
        ) {
            $this->kuota = 6;
            $this->kuota_reset = now('asia/makassar');
            $this->save();
        }
    }
}
