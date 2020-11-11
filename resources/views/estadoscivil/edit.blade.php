@extends('adminlte::layouts.app')

@section('htmlheader_title','Editar Estado civil')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Editar Estado civil')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/estadoscivil') }}">Estado civil</a></li>

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
<form method="POST" action="{{ route('estadoscivil.update', $estadoscivil->id ) }}">
  @csrf
  @method('PUT')
    <div class="form-group">
      <label for="estadoscivil">Estado Civil</label>
      <input type="text" class="form-control" id="estadoscivil" name="name" value="{{ $estadoscivil->name }}">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
  </form>
</div>

@endsection
