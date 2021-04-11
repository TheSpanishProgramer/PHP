@extends('admin.layouts.layout')

@section('meta-title')
    Administrar cursos
@endsection

@section('meta-title-header')
    Administración de cursos
@endsection

@push('styles')

    <link href="/admin-template/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/admin-template/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

@endpush

@section('content')

    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Pertenece a</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>

        @foreach($categories as $category)

            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ isset($category->category) ? $category->category->name : '-' }}</td>
                <td>
                    <form action="{{ route('admin.category.destroy', $category) }}" method="POST" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger" onclick="return confirm('¿Seguro que quiere eliminar el curso?')">
                            <i class="fa fa-times"></i>
                        </button>
                    </form>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>

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