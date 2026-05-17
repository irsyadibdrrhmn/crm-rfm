<x-app-layout><div class="panel p-6"><h1 class="text-2xl font-bold mb-5">Tambah Transaksi</h1><form method="POST" action="{{route('transaksi.store')}}" class="space-y-4">@csrf
<div><label class="label-modern">Pelanggan</label><select class="input-modern" name="pelanggan_id">@foreach($pelanggans as $p)<option value="{{$p->id}}">{{$p->nama}}</option>@endforeach</select></div>
<div><label class="label-modern">Tanggal Transaksi</label><input class="input-modern max-w-xs" type="date" name="tanggal_transaksi" value="{{date('Y-m-d')}}"></div>
<div class="grid gap-3 md:grid-cols-2">@foreach($layanans as $l)<div class="rounded-xl border border-slate-200 p-4"><label class="flex items-center gap-2 font-semibold"><input type="checkbox" name="layanan_id[]" value="{{$l->id}}">{{$l->nama_layanan}}</label><input class="input-modern mt-3" type="number" name="qty[]" value="1" min="1"></div>@endforeach</div>
<button class="btn-primary">Simpan</button></form></div></x-app-layout>
