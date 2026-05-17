<x-app-layout>
    <div class="space-y-6">
        <div class="panel p-6 flex items-center justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wider text-rose-600">Transaksi</p>
                <h1 class="mt-1 text-2xl font-bold text-slate-900">Riwayat Transaksi</h1>
            </div>
            <a href="{{ route('transaksi.create') }}" class="btn-primary">Tambah Transaksi</a>
        </div>

        <div class="panel overflow-hidden">
            <div class="overflow-x-auto">
                <table class="table-modern">
                    <thead><tr><th>Pelanggan</th><th>Tanggal</th><th>Total</th><th>Aksi</th></tr></thead>
                    <tbody>
                        @forelse($data as $d)
                            <tr>
                                <td class="font-semibold text-slate-800">{{ $d->pelanggan->nama }}</td>
                                <td>{{ optional($d->tanggal_transaksi)->format('d M Y') }}</td>
                                <td>Rp {{ number_format($d->total, 0, ',', '.') }}</td>
                                <td><a href="{{ route('transaksi.show', $d) }}" class="btn-light !px-3 !py-2">Detail</a></td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center text-slate-500">Belum ada transaksi.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="border-t border-slate-100 px-5 py-4">{{ $data->links() }}</div>
        </div>
    </div>
</x-app-layout>
