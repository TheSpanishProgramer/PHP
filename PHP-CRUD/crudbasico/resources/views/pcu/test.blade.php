@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h3 class="align-center">Certificación</h3>
    </section>

    {{--@include('flash::message')--}}

    <div class="content">
        @include('flash::message')

        {!! Form::open(['route' => 'pcu.validation', 'method' => 'post']) !!}
            @foreach($questions as $question)
                <div class="form-group"> <!-- Radio group !-->
                    <label class="control-label">{{$question->id}}. - {{$question->question}}</label>
                    <div class="form-input">
                        @foreach($question->certificationQuestionAnswers as $answer)
                            <input type="radio" name="{{$question->id}}" value="{{$answer->id}}" required>
                            {{$answer->answers}}
                            <br/>
                        @endforeach

                    </div>
                </div>

            @endforeach
            <div class="form-group"> <!-- Submit button !-->
                <button class="btn btn-success" type="submit">Certificar</button>
            </div>
        {!! Form::close() !!}

    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('input').iCheck({
            checkboxClass: 'icheckbox_square',
            radioClass: 'iradio_square-green'
//            increaseArea: '20%' // optional
        });
    });
</script>
@endsection
