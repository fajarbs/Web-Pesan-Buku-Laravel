@extends('layout')
@section('judul', $data->nama_pesan)
@section('konten')

<section class="hero is-success">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">{{ $data->nama_pesan }}</h1>
            <h2 class="subtitle">Data Pesan: {{ $data->kategori ? $data->kategori->nama_barang : '' }}</h2>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-three-quarters">
                <div class="card receipt-card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Kuitansi Pesan Buku
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <table class="table is-fullwidth is-bordered">
                                <tbody>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <td>{{ $data->kategori ? $data->kategori->nama_barang : '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Pesan</th>
                                        <td>{{ $data->nama_pesan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Harga Pesan</th>
                                        <td>{{ $data->harga_pesan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gambar Jaminan</th>
                                        <td>
                                            @if($data->gambar)
                                                <div class="image-container">
                                                    <img src="{{ asset('storage/' . $data->gambar) }}" alt="Gambar Pemeriksaan">
                                                </div>
                                            @else
                                                <p>Gambar tidak tersedia</p>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <button class="button is-primary is-fullwidth" onclick="window.print()">Print Receipt</button>
            </div>
        </div>
    </div>
</section>

@endsection

<style>
.receipt-card {
    border: 2px solid #3273dc;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.receipt-card .card-header {
    background-color: #3273dc;
    color: white;
}

.card-header-title {
    font-size: 1.5rem;
    font-weight: bold;
    text-transform: uppercase;
}

.table th, .table td {
    padding: 10px;
    border: 1px solid #3273dc;
    text-align: left;
}

.table th {
    background-color: #f5f5f5;
}

.image-container {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

.image-container img {
    max-width: 300px;
    height: auto;
    border: 1px solid #ddd;
    padding: 5px;
    background-color: #fff;
}

.button {
    margin-top: 20px;
}

@media print {
    .button {
        display: none;
    }
    .receipt-card {
        border: none;
        box-shadow: none;
    }
}
</style>
