<?php
namespace Database\Seeders;
use App\Models\{Layanan,Pelanggan,Transaksi,User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class CrmSeeder extends Seeder{
 public function run(): void {
  User::updateOrCreate(['email'=>'admin@diqichix.test'],['name'=>'Admin Salon','password'=>Hash::make('password')]);
  $pelangganData=[['nama'=>'Alya Putri','no_hp'=>'0811111111','alamat'=>'Bandung','tanggal_daftar'=>now()->subMonths(5)],['nama'=>'Nadia Sari','no_hp'=>'0822222222','alamat'=>'Bandung','tanggal_daftar'=>now()->subMonths(3)],['nama'=>'Mira Dewi','no_hp'=>'0833333333','alamat'=>'Cimahi','tanggal_daftar'=>now()->subMonths(2)]];
  foreach($pelangganData as $d){Pelanggan::updateOrCreate(['no_hp'=>$d['no_hp']],$d);} 
  $services=[['nama_layanan'=>'Hair Spa','harga'=>150000,'kategori'=>'Hair'],['nama_layanan'=>'Creambath','harga'=>120000,'kategori'=>'Hair'],['nama_layanan'=>'Manicure','harga'=>90000,'kategori'=>'Nail']];
  foreach($services as $s){Layanan::updateOrCreate(['nama_layanan'=>$s['nama_layanan']],$s+['is_active'=>1]);}
  $first=Pelanggan::first(); $lay=Layanan::first();
  if($first && $lay && Transaksi::count()==0){$t=Transaksi::create(['pelanggan_id'=>$first->id,'tanggal_transaksi'=>now()->subDays(3),'total'=>$lay->harga]);$t->details()->create(['layanan_id'=>$lay->id,'harga'=>$lay->harga,'qty'=>1,'subtotal'=>$lay->harga]);}
 }
}
