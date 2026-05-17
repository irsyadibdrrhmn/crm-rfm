<?php
namespace App\Http\Controllers;
use App\Models\{Pelanggan,Transaksi,RfmResult};
use Illuminate\Support\Facades\DB;
class LaporanController extends Controller{
 public function index(){ $pelanggan=Pelanggan::all(); $transaksi=Transaksi::with('pelanggan')->get(); $rfm=RfmResult::with('pelanggan')->get(); $topLayanan=DB::table('transaksi_details')->join('layanans','layanans.id','=','transaksi_details.layanan_id')->select('layanans.nama_layanan',DB::raw('sum(qty) total_qty'))->groupBy('layanans.nama_layanan')->orderByDesc('total_qty')->get(); return view('laporan.index',compact('pelanggan','transaksi','rfm','topLayanan')); }
}
