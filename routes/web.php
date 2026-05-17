<?php
use App\Http\Controllers\{DashboardController,LaporanController,LayananController,PelangganController,RfmController,TransaksiController,ProfileController};
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::middleware('auth')->group(function(){
 Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
 Route::resource('pelanggan',PelangganController::class)->except('show');
 Route::resource('layanan',LayananController::class)->except('show');
 Route::resource('transaksi',TransaksiController::class)->only(['index','create','store','show','destroy']);
 Route::get('/rfm',[RfmController::class,'index'])->name('rfm.index');
 Route::post('/rfm/process',[RfmController::class,'process'])->name('rfm.process');
 Route::get('/laporan',[LaporanController::class,'index'])->name('laporan.index');
 Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
 Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
 Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
