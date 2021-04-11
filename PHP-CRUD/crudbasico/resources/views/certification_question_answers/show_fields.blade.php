<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $certificationQuestionAnswer->id !!}</p>
</div>

<!-- Answers Field -->
<div class="form-group">
    {!! Form::label('answers', 'Answers:') !!}
    <p>{!! $certificationQuestionAnswer->answers !!}</p>
</div>

<!-- Valid Field -->
<div class="form-group">
    {!! Form::label('valid', 'Valid:') !!}
    <p>{!! $certificationQuestionAnswer->valid !!}</p>
</div>

<!-- Certification Question Id Field -->
<div class="form-group">
    {!! Form::label('certification_question_id', 'Certification Question Id:') !!}
    <p>{!! $certificationQuestionAnswer->certification_question_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $certificationQuestionAnswer->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $certificationQuestionAnswer->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $certificationQuestionAnswer->deleted_at !!}</p>
</div>

