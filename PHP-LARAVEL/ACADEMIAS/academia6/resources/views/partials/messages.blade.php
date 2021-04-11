@if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif

@if(session('error'))

    <div class="callout-alert">
        {{ session('error') }}
    </div>

@endif