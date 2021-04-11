<!doctype html>
<html>
    <head>
        <title>{{ Setting::get('system.schoolname') }}- About Us</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @stylesheets('bootstrap')
        @stylesheets('grans')
    </head>
    <body>
        {{ $header }}
        <div class='container-fluid'>
            <div class='row-fluid'>
                <div class="span8 offset2">
                	This is the e-Learning System for {{Setting::get('system.schoolname')}}
                    thanks for visiting.
                </div>
            </div>
        </div>
        {{-- Bootstrap JS Compiled --}}
        @javascripts('bootstrap')
        @javascripts('grans')
    </body>
</html>