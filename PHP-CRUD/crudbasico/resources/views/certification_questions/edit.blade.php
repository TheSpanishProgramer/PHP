@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Certification Question
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($certificationQuestion, ['route' => ['certificationQuestions.update', $certificationQuestion->id], 'method' => 'patch']) !!}

                        @include('certification_questions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection