@extends('adminlte::layouts.app')

@section('htmlheader_title','Eliminar Tipo de negociación')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Eliminar Tipo de negociación')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/tiponegociacion') }}">Tipo de negociación</a></li>

<li class="active">Eliminar</li>
@endsection




@section('content')

<h1>Realmente desea eliminar el registros: {{$tiponegociacion->name}}</h1>
<a class = "btn btn-primary" href="{{url("tiponegociacion")}}">Cancelar</a>
<form style="float: right;" method="POST" action="{{ route('tiponegociacion.destroy',$tiponegociacion->id) }}">
    @csrf
    @method('DELETE')
    
    <button  type="submit" class="btn btn-danger "> <i class="fa fa-trash"></i> </button>
    </form>

@endsection

