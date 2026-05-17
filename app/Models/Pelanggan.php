<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = ['nama','no_hp','alamat','email','jenis_kelamin','tanggal_daftar','catatan'];
    protected $casts = ['tanggal_daftar' => 'date'];

    public function transaksis(){ return $this->hasMany(Transaksi::class); }
    public function rfmResult(){ return $this->hasOne(RfmResult::class); }
}
