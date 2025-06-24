<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pesan extends Model
{
	use HasFactory;
	protected $table = 'pesan';

	protected $fillable = [
		"id_barang",
		"nama_pesan",
		"harga_pesan",
		"gambar",
		"lampiran",
		"lampiran_nama"
	];

	public function kategori(): BelongsTo
	{
		return $this->belongsTo(Barang::class, 'id_barang');
	}


	protected $casts = [
		'lampiran' => 'array',
		'lampiran_nama' => 'array',
	];
}