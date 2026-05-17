<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::create('pelanggans', function(Blueprint $t){$t->id();$t->string('nama');$t->string('no_hp');$t->text('alamat');$t->string('email')->nullable();$t->string('jenis_kelamin')->nullable();$t->date('tanggal_daftar');$t->text('catatan')->nullable();$t->timestamps();});
  Schema::create('layanans', function(Blueprint $t){$t->id();$t->string('nama_layanan');$t->string('kategori')->nullable();$t->decimal('harga',14,2);$t->string('durasi')->nullable();$t->text('deskripsi')->nullable();$t->boolean('is_active')->default(true);$t->timestamps();});
  Schema::create('transaksis', function(Blueprint $t){$t->id();$t->foreignId('pelanggan_id')->constrained('pelanggans')->cascadeOnDelete();$t->date('tanggal_transaksi');$t->decimal('total',14,2)->default(0);$t->text('catatan')->nullable();$t->timestamps();});
  Schema::create('transaksi_details', function(Blueprint $t){$t->id();$t->foreignId('transaksi_id')->constrained('transaksis')->cascadeOnDelete();$t->foreignId('layanan_id')->constrained('layanans')->restrictOnDelete();$t->decimal('harga',14,2);$t->integer('qty');$t->decimal('subtotal',14,2);$t->timestamps();});
  Schema::create('rfm_results', function(Blueprint $t){$t->id();$t->foreignId('pelanggan_id')->constrained('pelanggans')->cascadeOnDelete();$t->integer('recency');$t->integer('frequency');$t->decimal('monetary',14,2);$t->unsignedTinyInteger('r_score');$t->unsignedTinyInteger('f_score');$t->unsignedTinyInteger('m_score');$t->string('rfm_score',3);$t->string('segmentasi');$t->timestamps();});
 }
 public function down(): void {Schema::dropIfExists('rfm_results');Schema::dropIfExists('transaksi_details');Schema::dropIfExists('transaksis');Schema::dropIfExists('layanans');Schema::dropIfExists('pelanggans');}
};
