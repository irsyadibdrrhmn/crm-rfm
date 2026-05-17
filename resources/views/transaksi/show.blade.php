<x-app-layout><div class='p-6'><h1>Detail</h1>@foreach($transaksi->details as $d)<div>{{$d->layanan->nama_layanan}} x {{$d->qty}} = {{$d->subtotal}}</div>@endforeach</div></x-app-layout>
