@extends('layouts.layout')

@section('content')

    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Contact Me</h2>
        <hr class="star-dark mb-5">
        <h5 class="font-weight-light text-secondary mb-0 text-center">Contacta con nosotros si tiene alguna duda, le responderemos via email.</h5>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <form action="{{ route('pages.contact.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} floating-label-form-group controls mb-0 pb-2">
                            <label for="nameID" class="control-label">Name</label>
                            <input name="name" class="form-control" id="nameID" value="{{ old('name') }}" type="text" placeholder="Nombre">
                            {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} floating-label-form-group controls mb-0 pb-2">
                            <label for="emailID" class="control-label">Email Address</label>
                            <input name="email" class="form-control" id="emailID" value="{{ old('email') }}" type="email" placeholder="Email">
                            {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }} floating-label-form-group controls mb-0 pb-2">
                            <label for="messageID" class="control-label">Message</label>
                            <textarea name="message" class="form-control" id="messageID" rows="5" placeholder="Mensaje">{{ old('message') }}</textarea>
                            {!! $errors->first('message', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-xl">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection