<?php
namespace App\Http\Controllers;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
class PelangganController extends Controller{
 public function index(){ $data=Pelanggan::latest()->paginate(10); return view('pelanggan.index',compact('data')); }
 public function create(){ return view('pelanggan.create'); }
 public function store(Request $r){ $v=$r->validate(['nama'=>'required','no_hp'=>'required','alamat'=>'required','email'=>'nullable|email','jenis_kelamin'=>'nullable','tanggal_daftar'=>'required|date','catatan'=>'nullable']); Pelanggan::create($v); return redirect()->route('pelanggan.index')->with('ok','Tersimpan'); }
 public function edit(Pelanggan $pelanggan){ return view('pelanggan.edit',compact('pelanggan')); }
 public function update(Request $r,Pelanggan $pelanggan){ $v=$r->validate(['nama'=>'required','no_hp'=>'required','alamat'=>'required','email'=>'nullable|email','jenis_kelamin'=>'nullable','tanggal_daftar'=>'required|date','catatan'=>'nullable']); $pelanggan->update($v); return redirect()->route('pelanggan.index')->with('ok','Diupdate'); }
 public function destroy(Pelanggan $pelanggan){$pelanggan->delete(); return back()->with('ok','Dihapus');}
}
