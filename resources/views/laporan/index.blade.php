<x-app-layout>
    <div class="space-y-6 print:space-y-3">
        <div class="panel p-6 print:shadow-none print:border-0">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wider text-rose-600">Laporan</p>
                    <h1 class="mt-1 text-2xl font-bold text-slate-900">Ringkasan CRM</h1>
                </div>
                <button onclick="window.print()" class="btn-primary print:hidden">Print</button>
            </div>
        </div>
        <div class="grid gap-4 md:grid-cols-3">
            <div class="panel p-5"><p class="text-sm text-slate-500">Total Pelanggan</p><p class="mt-2 text-3xl font-bold">{{ count($pelanggan) }}</p></div>
            <div class="panel p-5"><p class="text-sm text-slate-500">Total Transaksi</p><p class="mt-2 text-3xl font-bold">{{ count($transaksi) }}</p></div>
            <div class="panel p-5"><p class="text-sm text-slate-500">Total Hasil RFM</p><p class="mt-2 text-3xl font-bold">{{ count($rfm) }}</p></div>
        </div>
    </div>
</x-app-layout>
