@extends('admin.layouts.layout')

@section('meta-title')
    Mensajes
@endsection

@section('meta-title-header')
    Contact me messages:
@endsection

@push('styles')

    <link href="/admin-template/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/admin-template/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

@endpush

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                @if(isset($contacts) && count($contacts) > 0)
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Solved</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($contacts as $contact)

                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->message }}</td>
                                <td>{{ $contact->solved ? 'True' : 'False' }}</td>
                                <td>
                                    <a href="{{ route('admin.contact.solved', $contact) }}" class="btn btn-xs btn-info">
                                        Change solved
                                    </a>

                                    <form action="{{ route('admin.contact.destroy', $contact) }}" method="POST" style="display: inline;">
                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                        <button class="btn btn-xs btn-warning" onclick="return confirm('El usuario no verificado será eliminado, ¿Está seguro?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                @else

                    <h3>No hay mensajes de contacto.</h3>

                @endif

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