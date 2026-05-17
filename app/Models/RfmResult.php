<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class RfmResult extends Model
{
    use HasFactory;
    protected $fillable=['pelanggan_id','recency','frequency','monetary','r_score','f_score','m_score','rfm_score','segmentasi'];
    public function pelanggan(){ return $this->belongsTo(Pelanggan::class); }
}
