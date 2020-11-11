@extends('adminlte::layouts.app')

@section('htmlheader_title','Editar Sector')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Editar Sector')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/sector') }}">Sector</a></li>

<li class="active">Editar</li>
@endsection




@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <h6>Por favor corrige los errores debajo:</h6>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
<form method="POST" action="{{ route('sector.update', $sector->id ) }}">
  @csrf
  @method('PUT')
    <div class="form-group">
      <label for="sector">Sector</label>
      <input type="text" class="form-control" id="sector" name="name" value="{{ $sector->name }}">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
  </form>
</div>

@endsection

