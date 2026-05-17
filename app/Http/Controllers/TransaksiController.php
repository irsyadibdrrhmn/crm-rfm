<?php
namespace App\Http\Controllers;
use App\Models\{Transaksi,Pelanggan,Layanan};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TransaksiController extends Controller{
 public function index(){ $data=Transaksi::with('pelanggan')->latest('tanggal_transaksi')->paginate(10); return view('transaksi.index',compact('data')); }
 public function create(){ $pelanggans=Pelanggan::orderBy('nama')->get(); $layanans=Layanan::where('is_active',1)->orderBy('nama_layanan')->get(); return view('transaksi.create',compact('pelanggans','layanans')); }
 public function store(Request $r){ $r->validate(['pelanggan_id'=>'required|exists:pelanggans,id','tanggal_transaksi'=>'required|date','layanan_id'=>'required|array|min:1','layanan_id.*'=>'exists:layanans,id','qty'=>'required|array']); DB::transaction(function() use ($r){$t=Transaksi::create(['pelanggan_id'=>$r->pelanggan_id,'tanggal_transaksi'=>$r->tanggal_transaksi,'total'=>0,'catatan'=>$r->catatan]); $total=0; foreach($r->layanan_id as $i=>$id){$lay=Layanan::findOrFail($id); $qty=max(1,(int)($r->qty[$i]??1)); $sub=$lay->harga*$qty; $t->details()->create(['layanan_id'=>$id,'harga'=>$lay->harga,'qty'=>$qty,'subtotal'=>$sub]); $total+=$sub;} $t->update(['total'=>$total]);}); return redirect()->route('transaksi.index'); }
 public function show(Transaksi $transaksi){ $transaksi->load('pelanggan','details.layanan'); return view('transaksi.show',compact('transaksi')); }
 public function destroy(Transaksi $transaksi){$transaksi->delete(); return back();}
}
