@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Equipment
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($equipment, ['route' => ['equipment.update', $equipment->id], 'method' => 'patch']) !!}

                        @include('equipment.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection