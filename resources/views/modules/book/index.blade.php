@extends('layouts.template')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">List Data Member</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Books</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Data Buku
                    <a href="{{ route('books.create') }}" class="btn btn-xs btn-primary">Tambah Data</a>
                    <a href="#" class="btn btn-xs btn-warning">Cetak Data</a>
                    </div>
                <div class="card-body">
                    @include('layouts.partials._flash')
                    <div class="table-responsive">
                        {!! $html->table(['class' => 'table table-bordered table-striped table-hover dataTable']) !!}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')

{!! $html->scripts() !!}

@endpush
