<!-- Socialname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('socialName', 'Socialname:') !!}
    {!! Form::text('socialName', null, ['class' => 'form-control', 'disabled' => true]) !!}
</div>

<!-- Forumname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('forumName', 'Forumname:') !!}
    {!! Form::text('forumName', null, ['class' => 'form-control', 'disabled' => true]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('gTAAccounts.index') !!}" class="btn btn-default">Cancel</a>
</div>
