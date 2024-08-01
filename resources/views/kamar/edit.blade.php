@extends('layouts.admin',["title"=>'Edit User'])
@section('content-header')
    <div class="row">
        <h1> <i class="fas fa-users"></i> User</h1>
    </div>
@endsection
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <x-form-edit :action="route('kamar.update',['kamar'=>$row->id])" :upload="true">
                <x-input label="Nama Kamar / Tipe Kamar" name="nama_kamar" :value="$row->nama_kamar" />
                    @if ($row->foto_kamar)
                        <div class="form-grup">
                            <img src="{{ url('/images/kamar/'.$row->foto_kamar) }}" class="img-fluid">
                        </div>
                    @endif
                <x-input label="Foto Kamar" name="foto_kamar" type="file" keterangan="Foto harus bertipe: png,jpg dan jpeg. Dimensi: min height 500px min width 1000px. Ukuran: min 50kb max 1000kb" />
                <x-input label="Jumlah Kamar" name="jum_kamar" type="number" :value="$row->jum_kamar" />
                <x-input label="Harga Kamar per Malam" name="harga_kamar" type="number" :value="$row->harga_kamar"  />
                <x-textarea label="Deskripsi Kamar" name="deskripsi_kamar" :value="$row->deskripsi_kamar" />
            </x-form-edit>
        </div>
    </div>
@endsection