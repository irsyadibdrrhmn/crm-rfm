@php
    $navItems = [
        ['label' => 'Dashboard', 'route' => 'dashboard'],
        ['label' => 'Pelanggan', 'route' => 'pelanggan.index'],
        ['label' => 'Layanan', 'route' => 'layanan.index'],
        ['label' => 'Transaksi', 'route' => 'transaksi.index'],
        ['label' => 'RFM', 'route' => 'rfm.index'],
        ['label' => 'Laporan', 'route' => 'laporan.index'],
    ];
@endphp

<aside class="fixed inset-y-0 left-0 z-40 hidden w-72 border-r border-white/40 bg-gradient-to-b from-[#1f2937] via-[#111827] to-[#0f172a] px-5 py-6 text-white shadow-2xl lg:block">
    <div class="mb-8">
        <p class="text-xs uppercase tracking-[0.25em] text-slate-300">CRM Analitik</p>
        <h1 class="mt-2 text-xl font-bold leading-tight">Diqi Chix's Salon</h1>
        <p class="mt-2 text-sm text-slate-300">Kelola pelanggan, transaksi, dan segmentasi dalam satu dashboard modern.</p>
    </div>

    <nav class="space-y-2">
        @foreach ($navItems as $item)
            @php($active = request()->routeIs($item['route']))
            <a href="{{ route($item['route']) }}" class="sidebar-link {{ $active ? 'sidebar-link-active' : '' }}">
                <span>{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <div class="mt-auto pt-10">
        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
            <p class="text-xs text-slate-300">Masuk sebagai</p>
            <p class="text-sm font-semibold">{{ auth()->user()->name ?? 'Admin' }}</p>
            <form class="mt-4" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn-light w-full !bg-white/10 !text-white !border-white/20 hover:!bg-white/20">Logout</button>
            </form>
        </div>
    </div>
</aside>

<nav class="sticky top-0 z-40 border-b border-slate-200 bg-white/90 px-4 py-3 backdrop-blur lg:hidden">
    <div class="flex items-center justify-between">
        <p class="font-semibold text-slate-900">Diqi Chix's Salon</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-sm font-semibold text-rose-700">Logout</button>
        </form>
    </div>
    <div class="mt-3 flex flex-wrap gap-2">
        @foreach ($navItems as $item)
            @php($active = request()->routeIs($item['route']))
            <a href="{{ route($item['route']) }}" class="rounded-lg px-3 py-1.5 text-xs font-semibold {{ $active ? 'bg-rose-100 text-rose-700' : 'bg-slate-100 text-slate-600' }}">
                {{ $item['label'] }}
            </a>
        @endforeach
    </div>
</nav>
