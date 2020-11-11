@extends('adminlte::layouts.app')

@section('htmlheader_title','Crear Sector')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Crear Sector')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/sector') }}">Sector</a></li>

<li class="active">Crear</li>
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
<form method="POST" action="{{ route('sector.store') }}">
  @csrf
    <div class="form-group">
      <label for="sector">Sector</label>
      <input type="text" class="form-control" id="sector" name="name">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection

