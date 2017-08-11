@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Profesional
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($profesional, ['route' => ['profesionals.update', $profesional->id], 'method' => 'patch']) !!}

                        @include('profesionals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection