@extends('admin.layouts.layout')

@section('meta-title')
    Matricular usuarios
@endsection

@push('styles')

    <link href="/admin-template/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/admin-template/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

@endpush

@section('meta-title-header')
    Matricular usuarios
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-green">
                <div class="panel-heading">
                    Matricular usuarios
                </div>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>EMAIL</th>
                            <th>ROL</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($users as $user)

                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->getRoleNames()[0] }}</td>
                                <td>

                                    <a href="{{ route('admin.matricula.edit', $user) }}" class="btn btn-primary">Modificar matriculas</a>

                                </td>
                            </tr>

                        @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="/admin-template/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/admin-template/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="/admin-template/datatables-responsive/dataTables.responsive.js"></script>
    <script src="/admin-templete/dist/js/sb-admin-2.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>
@endpush