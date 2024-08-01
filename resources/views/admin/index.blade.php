    @extends('layouts.admin', ['title'=>'User Admin'])
    @section('content-header')
        <div class="row">
            <h1> <i class="fas fa-users"></i> User</h1>
        </div>
    @endsection
    @section('content')
    <x-status />
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <x-btn-create :link="route('admin.create')" />
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
                                Nama User
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                Role
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
                                <td>{{$row->name}}</td>
                                <td>{{$row->username}}</td>
                                <td>{{$row->role}}</td>
                                <td>
                                    <x-btn-edit :link="route('admin.edit',['admin'=>$row->id])"/>
                                    <x-btn-delete :link="route('admin.destroy',['admin'=>$row->id])"/>
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
        <div class="card">
            <div class="card-body">
                <h1>Chart Role</h1>
                <div style="text-align: center;">
                    <canvas id="chartRole" width="400" height="400" style="margin: auto;"></canvas>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var jumlahAdmin = {{ $jumlahAdmin }};
            var jumlahUser = {{ $jumlahUser }};
        
            var ctxRole = document.getElementById('chartRole').getContext('2d');
            var myChartRole = new Chart(ctxRole, {
                type: 'pie',
                data: {
                    labels: ['Admin', 'User'],
                    datasets: [{
                        label: 'Roles',
                        data: [jumlahAdmin, jumlahUser],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1,
                    }]
                },
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                    aspectRatio: 1,
                }
            });
        </script>
        
    @endsection

    @section('modal')
        <x-modal-delete />
    @endsection