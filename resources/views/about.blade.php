@extends('template')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h2>About</h2>                        
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 text-center">
                                <img src="{{ asset('../assets/img/foto-profil.jpg') }}" class="img-fluid" alt="Foto Profil" style="max-width: 100%; height: auto;">
                            </div>
                            <div class="col-lg-9">
                                <h4>Aplikasi ini dibuat oleh :</h4>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td>Firdaus Bia Firmansyah</td>
                                            </tr>
                                            <tr>
                                                <td>Prodi</td>
                                                <td>:</td>
                                                <td>D4 Teknik Informatika</td>
                                            </tr>
                                            <tr>
                                                <td>NIM</td>
                                                <td>:</td>
                                                <td>2041720255</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>:</td>
                                                <td>10 Juli 2024</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
