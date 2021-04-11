@extends('layout')
@section('style')
<link rel="stylesheet" href="assets/css/main-.css" />
{!!Html::style('assets/css/main-.css')!!}

<script type="text/javascript">
  function populate(s1,s2)
  {
    var s1=document.getElementById(s1);
    var s2=document.getElementById(s2);
    s2.innerHTML= "";

    if(s1.value=="prescolar"||s1.value=="primero"||s1.value=="segundo"||s1.value=="tercero"||s1.value=="cuarto"||s1.value=="quinto"){
      var optionArray =["|", "concordia| Escuela la Concordia",
      "cervantes| Escuela la Cervantes",
      "laureles| Escuela Laureles",
      "grancolombia| Escuela la Gran Colombia"];
    }else if(s1.value=="sexto"||s1.value=="septimo"||s1.value=="octavo"||s1.value=="noveno"||s1.value=="decimo"||s1.value=="sexto"){
      var optionArray =["|", "principal|Sede Principal"];
    }

    for(var option in optionArray){
      var pair=optionArray[option].split("|");
      var newoption = document.createElement("option");
      newoption.value=pair[0];
      newoption.innerHTML=pair[1];
      s2.options.add(newoption);
    }
  }

  function populate2(s1,s2)
  {
    var s1=document.getElementById(s1);
    var s2=document.getElementById(s2);
    s2.innerHTML= "";

    if(s1.value=="concordia"||s1.value=="laureles"){
      var optionArray =["|", "mañana | mañana"];
    }else if(s1.value=="principal"||s1.value=="cervantes"||s1.value=="grancolombia"){
      var optionArray =["|", "tarde | tarde", "mañana | mañana"];
    }
    for(var option in optionArray){
      var pair=optionArray[option].split("|");
      var newoption = document.createElement("option");
      newoption.value=pair[0];
      newoption.innerHTML=pair[1];
      s2.options.add(newoption);
    }
  }




</script>
</head>
@endsection
@section('content')
				<!-- Main -->
					<div id="main" class="alt">
						@if (count($errors) > 0)
								<div class="alert alert-danger">
								<strong>Errores en el formulario</strong> Verifica los datos.<br><br>
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							<!-- One -->
								<section id="one">
											<div class="inner">
												<header class="major">

													</header>
													<h2 id="elements">Información Institucional</h2>
													<div class="inner">
														<div class="12u 15u$(big)">

															{!!Form::open(['route'=>'institucions.store','method'=>'POST','enctype'=>'multipart/form-data'])!!}

																	@include('estudiantes.partials.fieldsInstitucion')
															{!! Form::close() !!}
														

														</p>
														</div>
													</div>

											</div>
								</section>

					</div>
	@endsection
