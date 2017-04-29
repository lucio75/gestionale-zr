@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Samples
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($samples, ['route' => ['samples.update', $samples->id], 'method' => 'patch']) !!}

                        @include('samples.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection