@extends('admin.layouts.layout')

@section('meta-title')
    Asignaturas
@endsection

@push('styles')

    <link href="/admin-template/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/admin-template/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

@endpush

@section('meta-title-header')
    Administrar asignaturas
@endsection

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Todas las asignaturas
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Pertenece a</th>
                    <th>Profesor</th>
                    <th>Matriculados</th>
                    <th>Codigo matricula</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach($subjects as $subject)

                    <tr>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->category->name }}</td>
                        <td>{{ $subject->user->name }}</td>
                        <td>{{ count($subject->users) }}</td>
                        <td>
                            {{ $subject->matricula }}
                            <a href="{{ route('admin.subject.codigomatricula', $subject) }}" class="btn btn-xs btn-info pull-right" onclick="return confirm('¿Seguro que quiere cambiar la clave de la matrícula?')">
                                <i class="fa fa-refresh"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.subject.edit', $subject) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                            <form action="{{ route('admin.subject.destroy', $subject) }}" method="POST" style="display: inline;">
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <button href="{{ route('admin.subject.destroy', $subject) }}" class="btn btn-xs btn-danger" onclick="return confirm('¿Seguro que quiere eliminar esta asignatura? Se borrarán todos sus documentos.')">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->

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