<!doctype html>
<html>
    <head>
        <title>{{ Setting::get('system.schoolname') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @stylesheets('bootstrap')
        @stylesheets('grans')
    </head>
    <body>
        {{ $header }}
        <div class='container-fluid'>
            <div class='row-fluid'>
                <span class="offset2 span6">
                    <h2>500, Server Error.</h2>
                    <p>A Problem has been encountered on our Servers. We will solve the problem. In the mean time our site's other functions are still unaffected. You can check them out from our home page. <a href="{{Setting::get('app.url')}}">HOME</a>.</p>
                </span>
            </div>
        </div>
        
        <div id='footer' class="pull-right" style="padding:20px;margin:20px;clear:right;">
            {{Setting::get('system.schoolname')}} &copy; {{date('Y')}}
        </div>
        {{-- Bootstrap JS Compiled --}}
        @javascripts('bootstrap')
        @javascripts('grans')
        <script type="text/javascript">
            $('#navbar').scrollspy();
        </script>
    </body>
</html>