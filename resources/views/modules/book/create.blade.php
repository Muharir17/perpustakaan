@extends('layouts.template')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Tambah Data</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Books</a></li>
                <li class="breadcrumb-item active">Tambah Data </li>
            </ol>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Tambah Data Buku</div>
                <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="small mb-1" for="judul">Judul Buku</label>
                        <input class="form-control py-4" id="judul" value="{{ old('judul') }}" type="text" placeholder="Masukkan Judul Buku" name="judul" required autofocus/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="isbn">ISBN</label>
                        <input class="form-control py-4" id="isbn" value="{{ old('isbn') }}" type="text" placeholder="Masukkan ISBN" name="isbn" />
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="penerbit">Penerbit</label>
                        <input class="form-control py-4" id="penerbit" value="{{ old('penerbit') }}" type="text" placeholder="Masukkan Penerbit" name="penerbit" required />
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="tahun_terbit">Tahun Terbit</label>
                        <input class="form-control py-4" id="tahun_terbit" value="{{ old('tahun_terbit') }}" type="number" placeholder="Masukkan Tahun Terbit" name="tahun_terbit" required />
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="jumlah">Jumlah</label>
                        <input class="form-control py-4" id="jumlah" value="{{ old('jumlah') }}" type="number" placeholder="Masukkan Jumlah" name="jumlah" required />
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="penerbit">Deskripsi Buku</label>
                        <input class="form-control py-4" id="deskripsi" value="{{ old('deskripsi') }}" type="text" placeholder="Masukkan Penerbit" name="deskripsi" required />
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="tempat_lahir">Lokasi Buku</label>
                        <select class="form-control form-control-solid" id="exampleFormControlSelect1" name="lokasi">
                            <option value="" selected disabled>--Pilih Rak--</option>
                            <option value="rak1">RAK 1</option>
                            <option value="rak2">RAK 2</option>
                            <option value="rak3">RAK 3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="penerbit">Cover Buku</label>
                        <input class="form-control py-4" id="cover" value="{{ old('cover') }}" type="file" name="cover" required />
                    </div>

                    <div class="form-group d-flex align-items-center mt-4 mb-0">
                        <button type="submit" class="btn btn-primary">Simpan</button>  &nbsp;
                        <a href="{{ route('books.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </main>
@endsection
