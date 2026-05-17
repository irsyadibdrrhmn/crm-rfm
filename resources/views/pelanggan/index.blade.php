<x-app-layout>
    <div class="space-y-6">
        <div class="panel p-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wider text-rose-600">Pelanggan</p>
                    <h1 class="mt-1 text-2xl font-bold text-slate-900">Data Pelanggan</h1>
                </div>
                <a href="{{ route('pelanggan.create') }}" class="btn-primary">Tambah Pelanggan</a>
            </div>
        </div>

        <div class="panel overflow-hidden">
            <div class="overflow-x-auto">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Nama</th><th>No HP</th><th>Alamat</th><th>Tanggal Daftar</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $d)
                            <tr>
                                <td class="font-semibold text-slate-800">{{ $d->nama }}</td>
                                <td>{{ $d->no_hp }}</td>
                                <td>{{ $d->alamat }}</td>
                                <td>{{ optional($d->tanggal_daftar)->format('d M Y') }}</td>
                                <td><a href="{{ route('pelanggan.edit', $d) }}" class="btn-light !px-3 !py-2">Edit</a></td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center text-slate-500">Belum ada data pelanggan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="border-t border-slate-100 px-5 py-4">{{ $data->links() }}</div>
        </div>
    </div>
</x-app-layout>
