@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h3 class="align-center">Descripción del Personaje</h3>
        <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar elementum mauris. Duis ac dui nisi. In suscipit, velit tincidunt interdum lacinia, leo lacus consequat odio, laoreet placerat nisi nibh eget quam. Quisque id lectus ac dui ultricies pulvinar. Pellentesque porttitor mattis mi sit amet rutrum. Suspendisse lorem urna, gravida vitae lorem ac, porttitor vulputate nisl. Ut enim orci, dictum vitae eleifend sed, euismod a arcu. Sed aliquet neque nec odio accumsan malesuada. Nulla eleifend augue in arcu vestibulum eleifend.</h5>
    </section>

    {{--@include('flash::message')--}}

    <div class="content">
        @include('flash::message')

        {!! Form::open(['route' => 'pcu.character', 'method' => 'post']) !!}
            <textarea name="character_description" class="textarea" style="width:100%" rows="15" required></textarea>
            <div class="form-group"> <!-- Submit button !-->
                <button class="btn btn-success" type="submit">Enviar descripción</button>
            </div>
        {!! Form::close() !!}
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 2em;">
                *Como ejemplo de introducción historia, la siguiente sentencia representaría a un personaje:
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar elementum mauris. Duis ac dui nisi. In suscipit, velit tincidunt interdum lacinia, leo lacus consequat odio, laoreet placerat nisi nibh eget quam. Quisque id lectus ac dui ultricies pulvinar. Pellentesque porttitor mattis mi sit amet rutrum. Suspendisse lorem urna, gravida vitae lorem ac, porttitor vulputate nisl. Ut enim orci, dictum vitae eleifend sed, euismod a arcu. Sed aliquet neque nec odio accumsan malesuada. Nulla eleifend augue in arcu vestibulum eleifend.</p>           </div>
        </div>
        <div class="center-block">
            <img src="http://s4.postimg.org/cd454zz8t/avatar.png" class="img-responsive center-block">
        </div>
    </div>

@endsection
