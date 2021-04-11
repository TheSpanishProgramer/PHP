<!-- User Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('user_id', 'User: ') !!}
    <p>{!! $userCertification->user->name !!}</p>
</div>

<!-- Character Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('character_description', 'Descripción de personaje:') !!}
    {!! Form::textarea('character_description', null, ['class' => 'form-control', 'disabled' => true]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Estado: ') !!}
    {!! Form::select('status',['pendiente' =>'pendiente', 'validado' =>'validado', 'rechazado' =>'rechazado'],null, ['class' => 'form-control select2']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('userCertifications.index') !!}" class="btn btn-default">Cancelar</a>
</div>
