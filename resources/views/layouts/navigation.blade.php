<nav class="bg-rose-100 border-b border-rose-200">
 <div class="max-w-7xl mx-auto px-4 py-3 flex gap-4">
  <a href="{{ route('dashboard') }}">Dashboard</a><a href="{{ route('pelanggan.index') }}">Pelanggan</a><a href="{{ route('layanan.index') }}">Layanan</a><a href="{{ route('transaksi.index') }}">Transaksi</a><a href="{{ route('rfm.index') }}">RFM</a><a href="{{ route('laporan.index') }}">Laporan</a>
  <form class="ml-auto" method="POST" action="{{ route('logout') }}">@csrf <button>Logout</button></form>
 </div>
</nav>
