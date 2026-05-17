<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Layanan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_layanan','kategori','harga','durasi','deskripsi','is_active'];
    protected $casts = ['is_active'=>'boolean'];
    public function details(){ return $this->hasMany(TransaksiDetail::class); }
}
