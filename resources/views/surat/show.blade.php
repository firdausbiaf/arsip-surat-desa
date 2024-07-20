@extends('template')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2>Arsip Surat >> Lihat</h2>
                </div>

                <div class="card-body">
                    <h5>Nomor: {{ $surat->nomor }}</h5>
                    <h5>Kategori: {{ $surat->kategori->nama }}</h5>
                    <h5>Judul: {{ $surat->judul }}</h5>
                    <h5>Waktu Unggah: {{ $surat->created_at }}</h5>

                    <hr>

                    <embed src="data:{{ $mimeType }};base64,{{ base64_encode($fileContents) }}" type="{{ $mimeType }}" width="100%" height="600px" />
                    
                    <hr>

                    <a href="{{ route('surat.index') }}" class="btn btn-primary"> << Kembali </a>
                    <a href="{{ route('surat.download', $surat->id) }}" class="btn btn-success">Unduh</a>
                    <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-warning">Edit / Ganti File</a>
                </div>
            </div>
        </div>
    </div>
@endsection
