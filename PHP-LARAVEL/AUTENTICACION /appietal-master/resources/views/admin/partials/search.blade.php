{!!Form::model(Request::all(),['route'=>'list.aspirantes','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}

				    {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre del Aspirante'])!!}

				  <button type="submit" class="btn btn-default">Buscar!!</button>

	{!!Form::close()!!}
