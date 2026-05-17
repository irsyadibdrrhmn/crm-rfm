<?php
namespace App\Http\Controllers;
use App\Models\Layanan;
use Illuminate\Http\Request;
class LayananController extends Controller{
 public function index(){ $data=Layanan::latest()->paginate(10); return view('layanan.index',compact('data')); }
 public function create(){ return view('layanan.create'); }
 public function store(Request $r){ $v=$r->validate(['nama_layanan'=>'required','kategori'=>'nullable','harga'=>'required|numeric','durasi'=>'nullable','deskripsi'=>'nullable','is_active'=>'boolean']); $v['is_active']=$r->boolean('is_active'); Layanan::create($v); return redirect()->route('layanan.index'); }
 public function edit(Layanan $layanan){ return view('layanan.edit',compact('layanan')); }
 public function update(Request $r,Layanan $layanan){ $v=$r->validate(['nama_layanan'=>'required','kategori'=>'nullable','harga'=>'required|numeric','durasi'=>'nullable','deskripsi'=>'nullable','is_active'=>'boolean']); $v['is_active']=$r->boolean('is_active'); $layanan->update($v); return redirect()->route('layanan.index'); }
 public function destroy(Layanan $layanan){$layanan->delete(); return back();}
}
