@extends('adminlte::layouts.app')

@section('htmlheader_title','Calendario')  {{-- titulo pestaña  pagina --}}
@section('css')

<link href='{{ asset('packages/core/main.css') }}' rel='stylesheet' />
<link href='{{ asset('packages/daygrid/main.css') }}' rel='stylesheet' />
<link href='{{ asset('packages/timegrid/main.css') }}' rel='stylesheet' />
<link href='{{ asset('packages/list/main.css') }}' rel='stylesheet' />
<link href="{{ asset('packages/jqueryui/custom-theme/jquery-ui-1.10.4.custom.min.css') }}" rel="stylesheet">
<link href='{{ asset('packages/datepicker/datepicker.css') }}' rel='stylesheet' />
<link href='{{ asset('packages/colorpicker/bootstrap-colorpicker.min.css') }}' rel='stylesheet' />
<link href='{{ asset('css/style.css') }}' rel='stylesheet' />


@endsection
@section('contentheader_title','Calendario')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class="active">Calendario</li>
@endsection

@section('content')

@include('eventos.modal')
<div class="container">

  
    <button type="button" id="agregarj" class="btn btn-primary" data-toggle="modal" data-target="#addeventmodal">
      Agregar Evento
    </button>
     <select class="buscar" name=""  id="languages">
     @foreach ($con as $i)
      <option value="{{ $i }}">{{ isset($nom[$i])?$nom[$i]:$i }}</option>         
     @endforeach
     
   </select>
   
   
   

    <div id="calendar"></div>


    <form method="POST"  action="{{ route('drop') }}" id="dropform">
      @csrf
      <input type="hidden" id="id" name="id">
      <input type="hidden" id="start" name="start_event">
      <input type="hidden" id="end" name="end_event">
     
    </form>
</div>
@section('scriptss')

<script src='{{ asset('packages/core/main.js') }}'></script>
<script src='{{ asset('packages/core/locales-all.js') }}'></script>
<script src='{{ asset('packages/daygrid/main.js') }}'></script>
<script src='{{ asset('packages/timegrid/main.js') }}'></script>
<script src='{{ asset('packages/list/main.js') }}'></script>
<script src='{{ asset('packages/interaction/main.js') }}'></script>
<script src='{{ asset('packages/jqueryui/jqueryui.min.js') }}'></script>
<script src='{{ asset('packages/datepicker/datepicker.js') }}'></script>
<script src='{{ asset('packages/colorpicker/bootstrap-colorpicker.min.js') }}'></script>
<script src='{{ asset('js/calendar.js') }}'></script>



@endsection

@endsection