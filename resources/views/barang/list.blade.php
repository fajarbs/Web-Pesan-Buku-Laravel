@extends('layout')
@section('judul', 'Buku')
@section('konten')

<section class="hero is-primary">
    <div class="hero-body">
        <p class="title">Daftar Buku</p>
        <p class="subtitle">Pesan Buku Terbaik untuk Anda</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="columns is-multiline">
            @foreach ($data as $index => $item)
            <div class="column is-one-third">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            @if ($item->gambar)
                            <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->nama_barang }}">
                            @else
                            <img src="https://via.placeholder.com/256x256" alt="Placeholder">
                            @endif
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            
                            <div class="media-content">
                                <p class="title is-4">{{ $item->nama_barang }}</p>
                                <p class="subtitle is-6">{{ $item->merek }}</p>
                            </div>
                        </div>

                        <div class="content">
                            <p>{{ Str::limit($item->deskripsi, 100) }}</p>
                            
                            <p>
                                @if ($item->status == 'available')
                                <span class="tag is-success">Tersedia</span>
                                @else
                                <span class="tag is-danger">Tidak Tersedia</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="/barang/{{ $item->id }}" class="card-footer-item">Detail</a>
                        
                        @if ($item->status == 'available')
                        <a href="/pesan/{{ $item->id }}" class="card-footer-item">Pesan Sekarang</a>
                        @endif
                    </footer>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
