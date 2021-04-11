@extends('admin.layouts.layout')

@section('meta-title')
    Posts
@endsection

@section('meta-title-header')
    Administrar posts
@endsection

@push('styles')

    <link href="/admin-template/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/admin-template/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

@endpush

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Todos los usuarios
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Respuesta</th>
                            <th>Documento</th>
                            <th>Asignatura</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($posts as $post)

                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ isset($post->post_id) ? 'Si' : 'No' }}</td>
                                <td><a href="{{ route('document.show', $post->document) }}" class="btn btn-info">Ver documento</a></td>
                                <td>{{ $post->subject->name }} en {{ $post->subject->category->name }}</td>
                                <td>
                                    <a href="{{ route('post.show', $post) }}" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admin.post.edit', $post) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                                    <form action="{{ route('admin.post.destroy', $post) }}" method="POST" style="display: inline;">
                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                        <button class="btn btn-xs btn-danger" onclick="return confirm('¿Seguro que quiere eliminar este post?')">
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