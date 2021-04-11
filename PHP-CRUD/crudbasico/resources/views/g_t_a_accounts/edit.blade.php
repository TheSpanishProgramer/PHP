@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            G T A Account
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($gTAAccount, ['route' => ['gTAAccounts.update', $gTAAccount->id], 'method' => 'patch']) !!}

                        @include('g_t_a_accounts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection