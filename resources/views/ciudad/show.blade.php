@extends('adminlte::layouts.app')

@section('htmlheader_title','Eliminar Ciudad')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Eliminar Ciudad')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/ciudad') }}">Ciudad</a></li>

<li class="active">Eliminar</li>
@endsection

 


@section('content')

<h1>Realmente desea eliminar el registros: {{$ciudad->name}}</h1>
<a class = "btn btn-primary" href="{{url("ciudad")}}">Cancelar</a>
<form style="float: right;" method="POST" action="{{ route('ciudad.destroy',$ciudad->id) }}">
    @csrf
    @method('DELETE')
    
    <button  type="submit" class="btn btn-danger "> <i class="fa fa-trash"></i> </button>
    </form>

@endsection