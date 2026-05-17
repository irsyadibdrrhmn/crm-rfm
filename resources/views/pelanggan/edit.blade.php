<x-app-layout><div class="panel max-w-3xl p-6"><h1 class="text-2xl font-bold mb-5">Edit Pelanggan</h1><form method="POST" action="{{route('pelanggan.update',$pelanggan)}}" class="grid gap-4">@csrf @method('PUT')
<div><label class="label-modern">Nama</label><input class="input-modern" name="nama" value="{{$pelanggan->nama}}"></div>
<div><label class="label-modern">No HP</label><input class="input-modern" name="no_hp" value="{{$pelanggan->no_hp}}"></div>
<div><label class="label-modern">Alamat</label><input class="input-modern" name="alamat" value="{{$pelanggan->alamat}}"></div>
<div><label class="label-modern">Tanggal Daftar</label><input class="input-modern" type="date" name="tanggal_daftar" value="{{$pelanggan->tanggal_daftar?->format('Y-m-d')}}"></div>
<button class="btn-primary w-fit">Update</button></form></div></x-app-layout>
