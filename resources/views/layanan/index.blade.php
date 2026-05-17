<x-app-layout>
    <div class="space-y-6">
        <div class="panel p-6 flex items-center justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wider text-rose-600">Layanan</p>
                <h1 class="mt-1 text-2xl font-bold text-slate-900">Master Layanan</h1>
            </div>
            <a href="{{ route('layanan.create') }}" class="btn-primary">Tambah Layanan</a>
        </div>

        <div class="panel overflow-hidden">
            <div class="overflow-x-auto">
                <table class="table-modern">
                    <thead><tr><th>Nama Layanan</th><th>Harga</th><th>Aksi</th></tr></thead>
                    <tbody>
                        @forelse($data as $d)
                            <tr>
                                <td class="font-semibold text-slate-800">{{ $d->nama_layanan }}</td>
                                <td>Rp {{ number_format($d->harga, 0, ',', '.') }}</td>
                                <td><a href="{{ route('layanan.edit', $d) }}" class="btn-light !px-3 !py-2">Edit</a></td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="text-center text-slate-500">Belum ada data layanan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="border-t border-slate-100 px-5 py-4">{{ $data->links() }}</div>
        </div>
    </div>
</x-app-layout>
