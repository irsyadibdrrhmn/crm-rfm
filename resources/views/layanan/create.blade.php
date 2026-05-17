<x-app-layout><div class="panel max-w-3xl p-6"><h1 class="text-2xl font-bold mb-5">Tambah Layanan</h1><form method="POST" action="{{route('layanan.store')}}" class="grid gap-4">@csrf
<div><label class="label-modern">Nama Layanan</label><input class="input-modern" name="nama_layanan"></div>
<div><label class="label-modern">Harga</label><input class="input-modern" name="harga" type="number"></div>
<button class="btn-primary w-fit">Simpan</button></form></div></x-app-layout>
