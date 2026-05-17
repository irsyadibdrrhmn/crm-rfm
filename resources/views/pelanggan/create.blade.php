<x-app-layout>
<div class="panel max-w-3xl p-6">
<h1 class="text-2xl font-bold mb-5">Tambah Pelanggan</h1>
<form method="POST" action="{{route('pelanggan.store')}}" class="grid gap-4">@csrf
<div><label class="label-modern">Nama</label><input class="input-modern" name="nama" required></div>
<div><label class="label-modern">No HP</label><input class="input-modern" name="no_hp"></div>
<div><label class="label-modern">Alamat</label><input class="input-modern" name="alamat"></div>
<div><label class="label-modern">Tanggal Daftar</label><input class="input-modern" type="date" name="tanggal_daftar"></div>
<button class="btn-primary w-fit">Simpan</button>
</form></div>
</x-app-layout>
