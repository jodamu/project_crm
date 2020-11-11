@extends('adminlte::layouts.app')

@section('htmlheader_title','Negociaciones')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Negociaciones')  {{-- nombre pagina --}}

@section('breadcrumb')
<li class=""><a href="{{ url('/negociacion') }}">negociacion</a></li>

<li class="active">Editar</li>
@endsection


@section('content')
<div class="container">
<form class="row" method="POST" action="{{ route('tablero.update', $tablero->id ) }}">
    @csrf
    @method('PUT')
    <div class="form-group col-6">
      <label for="titulo">Contactos</label>
      <select class="form-control" name="contacto_id" id="contacto_id">
        <option value="">--Seleccione---</option>
        @foreach ($contactos as $contacto)
            @if ($contacto->id==$tablero->contacto_id)
                
        <option selected value="{{ $contacto->id }}">{{ $contacto->nombres }} {{ $contacto->apellidos }}</option>
        @else
        <option  value="{{ $contacto->id }}">{{ $contacto->nombres }} {{ $contacto->apellidos }}</option>
            @endif
            

        @endforeach
      </select>
    </div>
    
    <div class="form-group col-6">
      <label for="panel_id">Panel</label>
      <select class="form-control" name="panel_id" id="panel_id">
        <option value="">--Seleccione---</option>
        @foreach ($panels as $panel)
            @if ($panel->id==$tablero->panel_id)
                
        <option selected value="{{ $panel->id }}">{{ $panel->name }}</option>
        @else
        <option  value="{{ $panel->id }}">{{ $panel->name }}</option>
            @endif
            

        @endforeach
      </select>
    </div>

    <button class="btn btn-primary" type="submit">Guardar</button>
  </form>

<div class="container">
  <h1>listado Colaboradores</h1>
  <form method="POST" id="form_user" action="{{ route('tablerouser.store') }}" class="form-inline">
    @csrf
    <input type="hidden" name="tablero_id" value="{{ $tablero->id }}">
    <div class="form-group">
    <select class="form-control" name="user_id" id="user_id">
      @foreach ($usuarios as $llenar)
          <option value="{{ $llenar->id }}">{{ $llenar->name }}</option>
      @endforeach
    </select>
    </div>
    <button type="submit" class="btn btn-info">Agregar</button>
  </form>
<br>

<?php $tabuser=App\Tablero_user::all()->where('tablero_id',$tablero->id);
          ?>
<div class="d-flex justify-content-start">
    @foreach ($tabuser as $u)
    
<form method="POST" action="{{ route('tablerouser.destroy',$u->id) }}">
  @csrf
  @method('DELETE')

  <button class="btn btn-success mr-2" onclick="return confirm('¿Realmente deseas eliminar este Colaborador?');"  type="submit"  >
    <i class="fa fa-times-circle"></i> {{ $u->user->name }}
    
  </button>
  </form>

    @endforeach
  </div>
</div>
</div>

  @endsection