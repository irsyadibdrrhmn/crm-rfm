<x-app-layout>
<div class="p-6">
<h1 class="text-2xl font-bold text-rose-700">CRM Analitik Diqi Chix’s Salon</h1>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 my-4">@foreach($summary as $k=>$v)<div class="bg-white shadow rounded p-4"><div class="text-gray-500">{{ ucfirst($k) }}</div><div class="text-xl font-bold">{{ is_numeric($v)?number_format($v):$v }}</div></div>@endforeach</div>
<h2 class="font-semibold">Segmentasi</h2><ul>@foreach($segmentCounts as $s=>$t)<li>{{ $s }}: {{ $t }}</li>@endforeach</ul>
<h2 class="font-semibold mt-4">Layanan Paling Diminati</h2><ul>@foreach($topLayanan as $l)<li>{{ $l->nama_layanan }} ({{ $l->total_qty }})</li>@endforeach</ul>
</div>
</x-app-layout>
