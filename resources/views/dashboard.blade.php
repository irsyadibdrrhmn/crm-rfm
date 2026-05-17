<x-app-layout>
    <div class="space-y-6">
        <div class="panel p-6 lg:p-7">
            <p class="text-sm font-semibold uppercase tracking-wider text-rose-600">Dashboard</p>
            <h1 class="mt-2 text-2xl font-bold text-slate-900 lg:text-3xl">CRM Analitik Diqi Chix's Salon</h1>
            <p class="mt-2 max-w-3xl text-sm text-slate-600">Pantau performa bisnis, profil pelanggan, dan minat layanan dalam tampilan yang lebih rapi dan modern.</p>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            @foreach ($summary as $k => $v)
                <div class="panel p-5">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">{{ ucfirst($k) }}</p>
                    <p class="mt-3 text-2xl font-bold text-slate-900">{{ is_numeric($v) ? number_format($v) : $v }}</p>
                </div>
            @endforeach
        </div>

        <div class="grid gap-6 xl:grid-cols-2">
            <div class="panel p-6">
                <h2 class="text-lg font-bold text-slate-900">Segmentasi Pelanggan</h2>
                <ul class="mt-4 space-y-3">
                    @foreach ($segmentCounts as $s => $t)
                        <li class="flex items-center justify-between rounded-xl bg-slate-50 px-4 py-3">
                            <span class="text-sm font-semibold text-slate-700">{{ $s }}</span>
                            <span class="badge-primary">{{ $t }} pelanggan</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="panel p-6">
                <h2 class="text-lg font-bold text-slate-900">Layanan Paling Diminati</h2>
                <ul class="mt-4 space-y-3">
                    @foreach ($topLayanan as $l)
                        <li class="flex items-center justify-between rounded-xl bg-slate-50 px-4 py-3">
                            <span class="text-sm font-semibold text-slate-700">{{ $l->nama_layanan }}</span>
                            <span class="badge-success">{{ $l->total_qty }}x</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
