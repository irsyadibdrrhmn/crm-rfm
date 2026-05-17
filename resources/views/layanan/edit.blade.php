<x-app-layout><div class="panel max-w-3xl p-6"><h1 class="text-2xl font-bold mb-5">Edit Layanan</h1><form method="POST" action="{{route('layanan.update',$layanan)}}" class="grid gap-4">@csrf @method('PUT')
<div><label class="label-modern">Nama Layanan</label><input class="input-modern" name="nama_layanan" value="{{$layanan->nama_layanan}}"></div>
<div><label class="label-modern">Harga</label><input class="input-modern" name="harga" type="number" value="{{$layanan->harga}}"></div>
<button class="btn-primary w-fit">Update</button></form></div></x-app-layout>
