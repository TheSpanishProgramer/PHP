@extends('layouts.app')

@section('padding-left-nav')
@endsection

@section('content')
<div class="card">
    <div class="card-content">
        <span class="card-title">INICIAR SESION</span>

        <form role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">email</i>
                  <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
                  <label for="email" data-error="E-Mail no valido" data-success="good">E-Mail</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" name="password" type="password" class="validate" min="6" value="{{ old('password') }}" autocomplete="new-password" required>
                    <label for="password" data-error="Por favor ingresa tu contraseña" data-success="good">Contraseña</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12">
                    <input type="checkbox" id="test5" name="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label for="test5">Recordar sesión</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="waves-effect waves-light btn">
                        Ingresar
                    </button>

                    <a class="right" href="{{ url('/password/reset') }}">
                        Olvidaste tu contraseña?
                    </a>
                </div>
            </div>
        </form>
    </div>
    
</div>
@endsection

@section('scripts')
    <!-- Start of losvencedores Zendesk Widget script -->
    <script>/*<![CDATA[*/window.zEmbed||function(e,t){var n,o,d,i,s,a=[],r=document.createElement("iframe");window.zEmbed=function(){a.push(arguments)},window.zE=window.zE||window.zEmbed,r.src="javascript:false",r.title="",r.role="presentation",(r.frameElement||r).style.cssText="display: none",d=document.getElementsByTagName("script"),d=d[d.length-1],d.parentNode.insertBefore(r,d),i=r.contentWindow,s=i.document;try{o=s}catch(e){n=document.domain,r.src='javascript:var d=document.open();d.domain="'+n+'";void(0);',o=s}o.open()._l=function(){var e=this.createElement("script");n&&(this.domain=n),e.id="js-iframe-async",e.src="https://assets.zendesk.com/embeddable_framework/main.js",this.t=+new Date,this.zendeskHost="losvencedores.zendesk.com",this.zEQueue=a,this.body.appendChild(e)},o.write('<body onload="document._l();">'),o.close()}();
        /*]]>*/</script>
    <!-- End of losvencedores Zendesk Widget script -->
@endsection
