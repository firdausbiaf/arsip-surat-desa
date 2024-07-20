@extends('template')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2>Arsip Surat</h2>
                    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</p>
                    <p>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('surat.index') }}" method="GET" class="d-flex">                        
                        <span class="me-2 align-self-center">Cari Surat</span>                            
                        <input type="text" name="search" class="form-control me-2" placeholder="Cari berdasarkan judul..." value="{{ $search }}">                          
                        <button type="submit" class="btn btn-primary">Cari</button>                           
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nomor Surat</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Waktu Pengarsipan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surats as $surat)
                                <tr>
                                    <td>{{ $surat->nomor }}</td>
                                    <td>{{ $surat->kategori->nama }}</td>
                                    <td>{{ $surat->judul }}</td>
                                    <td>{{ $surat->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">Hapus</button>
                                        </form>
                                        <a href="{{ route('surat.download', $surat->id) }}" class="btn btn-sm btn-success">Unduh</a>
                                        <a href="{{ route('surat.show', $surat->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('surat.create') }}" class="btn btn-success">Arsipkan Surat..</a>
            </div>
        </div>        
    </div>
@endsection
