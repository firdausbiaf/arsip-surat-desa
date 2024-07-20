@extends('template')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2>Arsip Surat >> Unggah</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nomor" class="form-label">Nomor Surat</label>
                            <input type="text" class="form-control" id="nomor" name="nomor" required>
                        </div>

                        <div class="mb-3">
                            <label for="kategori_id" class="form-label">Kategori</label>
                            <select class="form-control" id="kategori_id" name="kategori_id" required>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Surat</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">Upload PDF</label>
                            <input type="file" class="form-control" id="file" name="file" accept=".pdf" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('surat.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
