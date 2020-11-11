@extends('adminlte::layouts.app')

@section('htmlheader_title','Eliminar Pais')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Eliminar Pais')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/pais') }}">Pais</a></li>

<li class="active">Eliminar</li>
@endsection

 


@section('content')

<h1>Realmente desea eliminar el registros: {{$pais->name}}</h1>
<a class = "btn btn-primary" href="{{url("pais")}}">Cancelar</a>
<form style="float: right;" method="POST" action="{{ route('pais.destroy',$pais->id) }}">
    @csrf
    @method('DELETE')
    
    <button  type="submit" class="btn btn-danger "> <i class="fa fa-trash"></i> </button>
    </form>

@endsection