<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class TransaksiDetail extends Model
{
    use HasFactory;
    protected $fillable=['transaksi_id','layanan_id','harga','qty','subtotal'];
    public function transaksi(){ return $this->belongsTo(Transaksi::class); }
    public function layanan(){ return $this->belongsTo(Layanan::class); }
}
