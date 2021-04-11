@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Certification Question Answer
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($certificationQuestionAnswer, ['route' => ['certificationQuestionAnswers.update', $certificationQuestionAnswer->id], 'method' => 'patch']) !!}

                        @include('certification_question_answers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection