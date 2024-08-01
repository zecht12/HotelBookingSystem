@extends('layouts.admin', ['title'=>'Kamar'])
@section('content-header')
    <div class="row">
        <h1> <i class="fas fa-bed"></i> Kamar</h1>
    </div>
@endsection
@section('content')
<x-status />
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <x-btn-create :link="route('kamar.create')" />
            <x-search/>
        </div>
        <div class="car-body">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>
                            No
                        </th>
                        <th>
                            Nama Kamar
                        </th>
                        <th>
                            Harga
                        </th>
                        <th>
                            Jumlah
                        </th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = $data->firstItem(); ?>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{ucwords($row->nama_kamar)}}</td>
                            <td>Rp {{number_format($row->harga_kamar,2,',','.')}}</td>
                            <td>{{$row->jum_kamar}}</td>
                            <td>
                                <x-btn-edit :link="route('kamar.edit',['kamar'=>$row->id])"/>
                                <x-btn-delete :link="route('kamar.destroy',['kamar'=>$row->id])"/>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-body py-0">
            {{$data->appends(['search'=>request()->search])->links('page')}}
        </div>
    </div>
@endsection

@section('modal')
    <x-modal-delete />
@endsection