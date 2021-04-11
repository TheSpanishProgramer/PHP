<!-- Answers Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('answers', 'Answers:') !!}
    {!! Form::textarea('answers', null, ['class' => 'form-control']) !!}
</div>

<!-- Valid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valid', 'Valid:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('valid', false) !!}
        {!! Form::checkbox('valid', '1', null) !!} Si
    </label>
</div>

<!-- Certification Question Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('certification_question_id', 'Certification Question Id:') !!}
    {!! Form::select('certification_question_id', $questions , null, ['class' => 'form-control select2']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('certificationQuestionAnswers.index') !!}" class="btn btn-default">Cancel</a>
</div>
