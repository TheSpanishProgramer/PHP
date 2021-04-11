@extends('layouts.app')
@section('content')
<div class="admin-banner">
    <h3>Data Anggota Kelas {{$kelas->name}}</h3>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card" style="padding:10px;">
                <table class="table-m" id="main-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>No identitas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kelas->anggota_kelas as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->user->role == '1'?'Guru':($item->user->role == '2'?'Siswa':($item->user->role == '3'?'Admin':''))}}</td>
                            <td>{{$item->user->no_identitas}}</td>
                            <td class="actions-admin"><a href="{{ url("admin/kelas/".$kelas->id."/kick/".$item->user->id ."/") }}" onClick="return confirm('Apa kamu yakin untuk melakukan operasi tersebut?')" class="text text-danger"><button class="btn btn-danger btn-action"><i class="zmdi zmdi-delete"></i> Kick</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/DataTables/datatables.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/material.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.material.min.css')}}" type="text/css" />
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('assets/DataTables/datatables.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/jquery.datatables.material.min.js') }}"></script>
@endsection
@section('script')
    <script type="text/javascript" >
        $(document).ready(function(){
            $('#main-table').DataTable( {
                columnDefs: [
                    {
                        targets: [ 0, 1, 2 ],
                        className: 'mdl-data-table__cell--non-numeric'
                    }
                ]
            } );
        })
    </script>
@endsection