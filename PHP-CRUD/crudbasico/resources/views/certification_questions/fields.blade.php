<!-- Question Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('question', 'Question:') !!}
    {!! Form::textarea('question', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('certificationQuestions.index') !!}" class="btn btn-default">Cancel</a>
</div>
