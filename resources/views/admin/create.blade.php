@extends('layouts.admin',["title"=>'Tambah User'])
@section('content-header')
    <div class="row">
        <h1> <i class="fas fa-users"></i> User</h1>
    </div>
@endsection
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <x-form-create :action="route('admin.store')">
                <x-input label="Nama" name="name" />
                <x-input label="Usernama" name="username" />
                <x-input label="Password" name="password" type="password" />
                <x-input label="Konfirmasi Password" name="password_confirmation" type="password" />
            </x-form-create>
        </div>
    </div>
@endsection