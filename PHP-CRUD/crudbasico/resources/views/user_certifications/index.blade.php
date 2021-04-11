@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1><i class="fa  fa-certificate"></i> Certificaciones</h1>
        <h4>Este es el panel de certificaciones, si va a validar cualquiera de la solicitudes intentar no dejarlo pendiente.</h4>
        {{--<h1 class="pull-right">--}}
           {{--<a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('userCertifications.create') !!}">Add New</a>--}}
        {{--</h1>--}}
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('user_certifications.table')
            <small>* La certificación es un paso importante para tener una buena base de usuarios, gracias por el esfuerzo.</small>
            </div>
        </div>
    </div>
@endsection

