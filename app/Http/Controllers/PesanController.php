<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pesan;
use App\Models\Barang;
use Illuminate\View\View;

class PesanController extends Controller
{
	public function list(): View
	{
		$data = Pesan::all();
		return view('pesan.list', ['data' => $data]);
	}

	public function list_barang($id): View
	{
		$data = Pesan::where("id_barang", $id)->get();
		$dataBarang = Barang::find($id);
		return view('pesan.kategori', ['data' => $data, 'kategori' => $dataBarang]);
	}

	public function detail($id): View
	{
		$data = Pesan::find($id);
		return view('pesan.detail', ['data' => $data]);
	}
}