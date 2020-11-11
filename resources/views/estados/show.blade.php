@extends('adminlte::layouts.app')

@section('htmlheader_title','Eliminar Estado')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Eliminar Estado')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/estado') }}">Estado</a></li>

<li class="active">Eliminar</li>
@endsection

 


@section('content')

<h1>Realmente desea eliminar el registros: {{$estado->name}}</h1>
<a class = "btn btn-primary" href="{{url("estado")}}">Cancelar</a>
<form style="float: right;" method="POST" action="{{ route('estado.destroy',$estado->id) }}">
    @csrf
    @method('DELETE')
    
    <button  type="submit" class="btn btn-danger "> <i class="fa fa-trash"></i> </button>
    </form>

@endsection