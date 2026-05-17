<?php
namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pelanggan;
use App\Models\RfmResult;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $summary=[
            'pelanggan'=>Pelanggan::count(),
            'layanan'=>Layanan::count(),
            'transaksi'=>Transaksi::count(),
            'pendapatan'=>Transaksi::sum('total'),
        ];
        $segmentCounts=RfmResult::select('segmentasi',DB::raw('count(*) as total'))->groupBy('segmentasi')->pluck('total','segmentasi');
        $topLayanan=DB::table('transaksi_details')->join('layanans','layanans.id','=','transaksi_details.layanan_id')->select('layanans.nama_layanan',DB::raw('sum(qty) total_qty'))->groupBy('layanans.nama_layanan')->orderByDesc('total_qty')->limit(5)->get();
        $transaksiTerbaru=Transaksi::with('pelanggan')->latest('tanggal_transaksi')->limit(5)->get();
        return view('dashboard',compact('summary','segmentCounts','topLayanan','transaksiTerbaru'));
    }
}
