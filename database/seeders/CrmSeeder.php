<?php

namespace Database\Seeders;

use App\Models\Layanan;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CrmSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@diqichix.test'],
            ['name' => 'Admin Salon', 'password' => Hash::make('password')]
        );

        $pelangganData = [
            ['nama' => 'Alya Putri', 'no_hp' => '0811111111', 'alamat' => 'Bandung', 'tanggal_daftar' => now()->subMonths(8)],
            ['nama' => 'Nadia Sari', 'no_hp' => '0822222222', 'alamat' => 'Bandung', 'tanggal_daftar' => now()->subMonths(6)],
            ['nama' => 'Mira Dewi', 'no_hp' => '0833333333', 'alamat' => 'Cimahi', 'tanggal_daftar' => now()->subMonths(5)],
            ['nama' => 'Rina Ayu', 'no_hp' => '0844444444', 'alamat' => 'Bandung', 'tanggal_daftar' => now()->subMonths(4)],
            ['nama' => 'Salsa Nabila', 'no_hp' => '0855555555', 'alamat' => 'Lembang', 'tanggal_daftar' => now()->subMonths(7)],
            ['nama' => 'Tiara Maharani', 'no_hp' => '0866666666', 'alamat' => 'Cimahi', 'tanggal_daftar' => now()->subMonths(3)],
            ['nama' => 'Dinda Laras', 'no_hp' => '0877777777', 'alamat' => 'Bandung', 'tanggal_daftar' => now()->subMonths(9)],
            ['nama' => 'Kania Zahra', 'no_hp' => '0888888888', 'alamat' => 'Soreang', 'tanggal_daftar' => now()->subMonths(2)],
            ['nama' => 'Lita Mahar', 'no_hp' => '0899999999', 'alamat' => 'Bandung', 'tanggal_daftar' => now()->subMonths(10)],
            ['nama' => 'Fani Amelia', 'no_hp' => '0812000000', 'alamat' => 'Padalarang', 'tanggal_daftar' => now()->subMonths(1)],
        ];

        foreach ($pelangganData as $pelanggan) {
            Pelanggan::updateOrCreate(['no_hp' => $pelanggan['no_hp']], $pelanggan);
        }

        $services = [
            ['nama_layanan' => 'Hair Spa', 'harga' => 150000, 'kategori' => 'Hair'],
            ['nama_layanan' => 'Creambath', 'harga' => 120000, 'kategori' => 'Hair'],
            ['nama_layanan' => 'Hair Coloring', 'harga' => 350000, 'kategori' => 'Hair'],
            ['nama_layanan' => 'Hair Cut Premium', 'harga' => 100000, 'kategori' => 'Hair'],
            ['nama_layanan' => 'Manicure', 'harga' => 90000, 'kategori' => 'Nail'],
            ['nama_layanan' => 'Pedicure', 'harga' => 110000, 'kategori' => 'Nail'],
            ['nama_layanan' => 'Gel Polish', 'harga' => 140000, 'kategori' => 'Nail'],
            ['nama_layanan' => 'Facial Brightening', 'harga' => 175000, 'kategori' => 'Face'],
            ['nama_layanan' => 'Totok Wajah', 'harga' => 130000, 'kategori' => 'Face'],
            ['nama_layanan' => 'Body Spa', 'harga' => 280000, 'kategori' => 'Body'],
        ];

        foreach ($services as $service) {
            Layanan::updateOrCreate(['nama_layanan' => $service['nama_layanan']], $service + ['is_active' => 1]);
        }

        if (Transaksi::count() > 0) {
            return;
        }

        $pelangganList = Pelanggan::orderBy('id')->get();
        $layananList = Layanan::orderBy('id')->get();

        foreach ($pelangganList as $index => $pelanggan) {
            $transaksiCount = ($index % 3) + 2;

            for ($i = 0; $i < $transaksiCount; $i++) {
                $tanggal = now()->subDays(($index * 5) + ($i * 9) + rand(1, 12));
                $selectedLayanan = $layananList->shuffle()->take(rand(1, 3));

                $transaksi = Transaksi::create([
                    'pelanggan_id' => $pelanggan->id,
                    'tanggal_transaksi' => $tanggal,
                    'total' => 0,
                    'catatan' => 'Reservasi otomatis dari data seeder',
                ]);

                $total = 0;

                foreach ($selectedLayanan as $layanan) {
                    $qty = rand(1, 2);
                    $subtotal = $layanan->harga * $qty;
                    $total += $subtotal;

                    $transaksi->details()->create([
                        'layanan_id' => $layanan->id,
                        'harga' => $layanan->harga,
                        'qty' => $qty,
                        'subtotal' => $subtotal,
                    ]);
                }

                $transaksi->update(['total' => $total]);
            }
        }
    }
}
