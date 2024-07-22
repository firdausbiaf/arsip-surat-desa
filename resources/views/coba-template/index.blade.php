@extends('template')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2>Kategori Surat</h2>
                    <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.</p>
                    <p>Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>
                </div>
                
                <div class="card-body">
                    <div class="mb-3">
                        <form action="{{ route('kategori.index') }}" method="GET" class="d-flex">
                            <span class="me-2 align-self-center">Cari Kategori</span>
                            <input type="text" name="search" class="form-control me-2" placeholder="Cari...">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </form>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoris as $kategori)
                            <tr>
                                <th scope="row">{{ $kategori->id }}</th>
                                <td>{{ $kategori->nama }}</td>
                                <td>{{ $kategori->keterangan }}</td>
                                <td>                                    
                                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                    </form>
                                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('kategori.create') }}" class="btn btn-success"> ( + ) Tambah Kategori Baru</a>
            </div>
        </div>        
    </div>
@endsection
