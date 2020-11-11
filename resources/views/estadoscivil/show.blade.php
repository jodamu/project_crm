@extends('adminlte::layouts.app')

@section('htmlheader_title','Eliminar Estado civil')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Eliminar Estado civil')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/estadocivil') }}">Estado Civil</a></li>

<li class="active">Eliminar</li>
@endsection

 


@section('content')

<h1>Realmente desea eliminar el registros: {{$estadoscivil->name}}</h1>
<a class = "btn btn-primary" href="{{url("estadoscivil")}}">Cancelar</a>
<form style="float: right;" method="POST" action="{{ route('estadoscivil.destroy',$estadoscivil->id) }}">
    @csrf
    @method('DELETE')
    
    <button  type="submit" class="btn btn-danger "> <i class="fa fa-trash"></i> </button>
    </form>

@endsection