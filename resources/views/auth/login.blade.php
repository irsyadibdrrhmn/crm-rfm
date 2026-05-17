<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login CRM Analitik Diqi Chix’s Salon</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-rose-100 via-pink-100 to-white p-4">
<div class="max-w-5xl w-full grid md:grid-cols-2 overflow-hidden rounded-2xl shadow-xl bg-white">
    <div class="p-10 text-rose-900 bg-gradient-to-br from-rose-200 to-pink-100">
        <h1 class="text-3xl font-extrabold mb-4">CRM Analitik Diqi Chix’s Salon</h1>
        <p class="leading-relaxed">Kelola pelanggan, layanan, transaksi, dan segmentasi loyalitas berbasis RFM secara terpusat.</p>
    </div>
    <div class="p-10 bg-white">
        <h2 class="text-2xl font-bold text-rose-700 mb-6">Masuk ke Dashboard</h2>
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div><label class="label-modern">Email</label><input class="input-modern" type="email" name="email" value="{{ old('email') }}" required></div>
            <div><label class="label-modern">Kata Sandi</label><input class="input-modern" type="password" name="password" required></div>
            <label class="text-sm text-gray-600 flex items-center gap-2"><input type="checkbox" name="remember" class="rounded border-gray-300"> Ingat saya</label>
            <button class="btn-primary w-full">Masuk</button>
        </form>
    </div>
</div>
</body></html>
