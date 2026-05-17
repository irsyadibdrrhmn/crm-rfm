<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['pelanggan_id','tanggal_transaksi','total','catatan'];
    protected $casts = ['tanggal_transaksi'=>'date','total'=>'decimal:2'];
    public function pelanggan(){ return $this->belongsTo(Pelanggan::class); }
    public function details(){ return $this->hasMany(TransaksiDetail::class); }
}
