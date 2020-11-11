@extends('adminlte::layouts.app')

@section('htmlheader_title','Editar Sector')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Editar Sector')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/sector') }}">Sector</a></li>

<li class="active">Editar</li>
@endsection




@section('content')

<h1>Realmente desea eliminar el registros: {{$sector->name}}</h1>
<a class = "btn btn-primary" href="{{url("sector")}}">Cancelar</a>
<form style="float: right;" method="POST" action="{{ route('sector.destroy',$sector->id) }}">
    @csrf
    @method('DELETE')
    
    <button  type="submit" class="btn btn-danger "> <i class="fa fa-trash"></i> </button>
    </form>

@endsection

