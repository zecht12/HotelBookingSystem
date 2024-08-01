@extends('layouts.admin', ['title'=>'Tambah Kamar'])
@section('content-header')
    <div class="row">
        <h1> <i class="fas fa-bed"></i> Tambah Kamar</h1>
    </div>
@endsection
@section('content')
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-6">
            <x-form-create :action="route('kamar.store')" :upload="true">
                <x-input label="Nama Kamar / Tipe Kamar" name="nama_kamar" />
                <x-input label="Foto Kamar" name="foto_kamar" type="file" keterangan="Foto harus bertipe: png,jpg dan jpeg. Dimensi: min height 500px min width 1000px. Ukuran: min 50kb max 1000kb" />
                <x-input label="Jumlah Kamar" name="jum_kamar" type="number" />
                <x-input label="Harga Kamar per Malam" name="harga_kamar" type="number"  />
                <x-textarea label="Deskripsi Kamar" name="deskripsi_kamar"  />
            </x-form-create>
        </div>
    </div>
@endsection