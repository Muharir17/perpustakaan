@extends('layouts.template')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Tambah Data</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Members</a></li>
                <li class="breadcrumb-item active">Tambah Data </li>
            </ol>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Tambah Data Member</div>
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
                <form method="POST" action="{{ route('members.store') }}">
                    @csrf
                    <div class="form-group">
                        <label class="small mb-1" for="email">Nama Lengkap</label>
                        <input class="form-control py-4" id="name" value="{{ old('name') }}" type="text" placeholder="Masukkan Nama Lengkap" name="nama" required autofocus/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="npm">NPM</label>
                        <input class="form-control py-4" id="npm" value="{{ old('npm') }}" type="text" placeholder="Masukkan NPM" name="npm" />
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="tempat_lahir">Tempat Lahir</label>
                        <input class="form-control py-4" id="tempat_lahir" value="{{ old('tempat_lahir') }}" type="text" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" required />
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="tgl_lahir">Tanggal Lahir</label>
                        <input class="form-control py-4" id="tgl_lahir" value="{{ old('tgl_lahir') }}" type="date" placeholder="Masukkan Tanggal Lahir" name="tgl_lahir" required />
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="jk">Jenis Kelamin</label> <br>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" id="customRadio1" type="radio" name="jk" value="L">
                            <label class="custom-control-label" for="customRadio1">Laki-laki</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" id="customRadio2" type="radio" name="jk" value="P">
                            <label class="custom-control-label" for="customRadio2">Perempuan</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="tempat_lahir">Prodi</label>
                        <select class="form-control form-control-solid" id="exampleFormControlSelect1" name="prodi">
                            <option value="" selected disabled>--Pilih Prodi--</option>
                            <option value="TI">Teknik Informatika</option>
                            <option value="SI">Sistem Informasi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="tempat_lahir">Tautkan Akun</label>
                        <select class="form-control form-control-solid" id="exampleFormControlSelect2" name="user_id">
                            <option value="" selected disabled>--Pilih User--</option>
                            @foreach($users as $u)
                                <option value="{{ $u->id }}">{{ $u->name }} - {{ $u->email }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group d-flex align-items-center mt-4 mb-0">
                        <button type="submit" class="btn btn-primary">Simpan</button>  &nbsp;
                        <a href="{{ route('users.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </main>
@endsection
