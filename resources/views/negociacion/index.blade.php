@extends('adminlte::layouts.app')

@section('htmlheader_title','Negociaciones')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Negociaciones')  {{-- nombre pagina --}}



@section('content')
<div class="container-fluid pb-3">
  <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Agregar Panel</button>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Panel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('panel.store') }}">
          @csrf
          <div class="form-group">
            <label for="panel">Panel</label>
            <input type="text" class="form-control" id="panel" name="name">
          </div>
      
          <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


  <button data-toggle="modal" data-target="#tablero" class="btn btn-success float-right">Agregar Etiqueta</button>
    <!-- Modal -->
<div class="modal fade" id="tablero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Tablero</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('tablero.store') }}">
          @csrf
          <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo">
          </div>
          <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="panel_id">Panel</label>
            <select class="form-control" name="panel_id" id="panel_id">
              <option value="">--Seleccione---</option>
              @foreach ($panels as $panel)
                  
              <option value="{{ $panel->id }}">{{ $panel->name }}</option>

              @endforeach
            </select>
          </div>
      
          <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</div>
<div class="container-fluid pt-3 entro"> 
  @foreach ($panels as $panel)
      

  <ul id="{{ $panel->id }}" class="panel">
    <form style="float: right;" method="POST" action="{{ route('panel.destroy',$panel->id) }}">
      @csrf
      @method('DELETE')
      
      <button  onclick="return confirm('¿Realmente deseas eliminar este panel?');"  style="color: red; opacity: 1;font-size: 31px;padding-right: 4px;" type="submit" class="close" >
        <span aria-hidden="true">&times;</span>
        
      </button>
      </form>


    
    
    <ol class="ui-state-default ui-state-disabled bg-primary">{{ $panel->name }}</ol>
 

    <?php $tableros = App\Panel::findOrFail($panel->id)->tablero;
  
    ?>
  
      @foreach ($tableros as $tablero)
          <?php $tab=App\Tablero::find($tablero->id);
        
          ?>
    
            <li data-toggle='modal' valor='' data-target='.exampleModal' class="ui-state-default dato " id="{{ $tablero->id }}">
                <form style="float: right;" method="POST" action="{{ route('tablero.destroy',$tablero->id) }}">
                  @csrf
                  @method('DELETE')
                  <a href="{{ url('/negociacion/'.$tablero->id .'/edit') }}"  style="color: #000000; opacity: 1;" type="button" class="close" >
                    <i class="fa fa-edit"></i></a>

                  <button  onclick="return confirm('¿Realmente deseas eliminar este Tablero?');"  style="color: red; opacity: 1;font-size: 31px;padding-right: 4px;" type="submit" class="close" >
                    <i class="fa fa-times-circle"></i>
                    
                  </button>
                  </form>

              <div class=" w-100 ">
              
                <h3 class="mb-1">{{ $tablero->contacto->nombres }} {{ $tablero->contacto->apellidos }}</h3>
                <small>{{ $tablero->contacto->telefono }}</small><br>
                <small>{{ $tablero->contacto->email }}</small>
                <div>
                  <h4><b>Colaboradores</b> </h4>
                
                  @foreach ($tab->users as $u)
                      <span class="label label-primary">{{ $u->name }}</span>
                  @endforeach
                    <hr>

                </div>
              </div>
              
                
                  
                      <button class="btn btn-success btn-block text-left"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $tablero->id }}">
                        Negociaciones <i class="fa fa-angle-down"></i>
                      </button>
                  
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal{{ $tablero->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Negociaciones de {{ $tablero->contacto->nombres }} {{ $tablero->contacto->apellidos }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="list-group">
                                @foreach ($tiponegociaciones as $tiponegociacion)
                                <button  class="list-group-item d-flex justify-content-between align-items-center">
                                      {{ $tiponegociacion->name }} <br>
                                      Ultima.  {{ date('Y-m-d') }}
                                      <span class="badge">{{ rand(1, 15) }}</span>
                                    </button>
                                @endforeach

                                  
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
            </li>
                        
      @endforeach
  </ul>
  @endforeach
</div>


<form action="{{ route('cambiar') }}" method="POST" id="form">
  @csrf
 

  <input type="hidden" name="name" id="array">
</form>

@endsection