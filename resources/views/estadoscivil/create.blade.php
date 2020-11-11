@extends('adminlte::layouts.app')

@section('htmlheader_title','Crear Estado Civil')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Crear Estado Civil')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/estadoscivil') }}">Estado Civil</a></li>

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
<form method="POST" action="{{ route('estadoscivil.store') }}">
  @csrf
    <div class="form-group">
      <label for="estadoscivil">Estado Civil</label>
      <input type="text" class="form-control" id="estadoscivil" name="name">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection
