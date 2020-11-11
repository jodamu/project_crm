@extends('adminlte::layouts.app')

@section('htmlheader_title','Eliminar tipo')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Eliminar tipo')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/tipo') }}">Tipos</a></li>

<li class="active">Eliminar</li>
@endsection




@section('content')

<h1>Realmente desea eliminar el registros: {{$tipo->name}}</h1>
<a class = "btn btn-primary" href="{{url("tipo")}}">Cancelar</a>
<form style="float: right;" method="POST" action="{{ route('tipo.destroy',$tipo->id) }}">
    @csrf
    @method('DELETE')
    
    <button  type="submit" class="btn btn-danger "> <i class="fa fa-trash"></i> </button>
    </form>

@endsection

