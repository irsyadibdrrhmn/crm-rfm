<x-app-layout>
    <div class="space-y-6">
        <div class="panel p-6">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wider text-rose-600">RFM</p>
                    <h1 class="mt-1 text-2xl font-bold text-slate-900">Analisis Segmentasi Pelanggan</h1>
                </div>
                <form method="POST" action="{{ route('rfm.process') }}">@csrf<button class="btn-primary">Proses Analisis RFM</button></form>
            </div>
            <form class="mt-4 grid gap-3 md:grid-cols-3">
                <input class="input-modern" name="search" value="{{ request('search') }}" placeholder="Cari nama pelanggan">
                <select class="input-modern" name="segmentasi">
                    <option value="">Semua Segmentasi</option>
                    @foreach($segments as $s)
                        <option value="{{ $s }}" @selected($s == request('segmentasi'))>{{ $s }}</option>
                    @endforeach
                </select>
                <button class="btn-secondary">Filter</button>
            </form>
        </div>

        <div class="panel overflow-hidden">
            <div class="overflow-x-auto">
                <table class="table-modern">
                    <thead><tr><th>Pelanggan</th><th>R</th><th>F</th><th>M</th><th>Skor</th><th>Segmentasi</th></tr></thead>
                    <tbody>
                        @forelse($data as $d)
                            <tr>
                                <td class="font-semibold text-slate-800">{{ $d->pelanggan->nama }}</td>
                                <td>{{ $d->recency }}</td><td>{{ $d->frequency }}</td><td>Rp {{ number_format($d->monetary, 0, ',', '.') }}</td>
                                <td><span class="badge-primary">{{ $d->rfm_score }}</span></td>
                                <td><span class="badge-success">{{ $d->segmentasi }}</span></td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center text-slate-500">Belum ada hasil analisis RFM.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="border-t border-slate-100 px-5 py-4">{{ $data->links() }}</div>
        </div>
    </div>
</x-app-layout>
