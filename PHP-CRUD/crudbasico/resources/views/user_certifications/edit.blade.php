@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Certificación de Usuario
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($userCertification, ['route' => ['userCertifications.update', $userCertification->id], 'method' => 'patch']) !!}

                        @include('user_certifications.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection