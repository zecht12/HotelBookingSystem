@extends('layouts.admin',["title"=>'My Account'])
@section('content-header')
    <div class="row">
        <h1> <i class="fas fa-user"></i> My Account</h1>
    </div>
@endsection
@section('content')
    <x-status/>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <x-form-edit :action="route('admin.akun')" :header="false">
                <x-input label="Nama" name="name" :value="$row->name" />
                <x-input label="Username" name="username" :value="$row->username" />
                <x-input label="Password" name="password" type="password" />
                <x-input label="Konfirmasi Password" name="password_confirmation" type="password" />
            </x-form-edit>
        </div>
    </div>
@endsection