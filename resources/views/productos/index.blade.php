@extends('adminlte::layouts.app')

@section('htmlheader_title','Listado de Productos')  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Listado de Productos')  {{-- nombre pagina --}}


@section('breadcrumb')
<li class="active">Productos</li>
@endsection

@section('content')
<div style="display: flex; justify-content: space-between;">
    <a href="{{ route('producto.create') }}"  class="btn btn-success">  <i class="fa fa-plus"></i> Agregar</a>
        @if ($stock->count()>0)
            <button  data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-block col-8">Productos agotados: {{ $stock->count() }}</button>
            <!-- Modal -->
                
        @endif
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Productos agotados: {{ $stock->count() }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="list-group">
                        
                        @foreach ($stock as $item)
                            <a href="{{ url('/producto/'.$item->id .'/edit') }}" class="list-group-item list-group-item-action">{{ $item->nombre }}
                                <span class="badge badge-primary badge-pill">Stock: {{ $item->stock }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>
</div>
<table class="table table-bordered">
    <thead>
    <tr class="bg-info">
        <th>PRODUCTO</th>
        <th>DESCRIPCIÓN</th>
        <th>STOCK</th>
        <th>VALOR COMPRA</th>
        <th>VALOR VENTA</th>
        <th>ACCIONES </th>
    </tr>
</thead>
<tbody>
@foreach ($productos as $producto)
    
    <tr>
        <td>{{ $producto->nombre }}</td>
        <td>{{ substr($producto->descripcion, 0, 50) }}... <span   data-toggle="tooltip" data-html="true" title="{{ $producto->descripcion }}"> <i class="fa fa-eye"></i></span></td>
        <td @if ($producto->stock < 5) class="bg-danger" @endif>{{ $producto->stock }}</td>
        <td>{{ number_format($producto->valor_compra, 0, ',', '.') }}</td>
        <td>{{ number_format($producto->valor_venta, 0, ',', '.') }}</td>
        <td>
            <div class="btn-group">
                
                {{-- BOTON EDITAR --}}
                <a href="{{ url('/producto/'.$producto->id .'/edit') }}" class="btn btn-warning btn-sm">  <i class="fa fa-edit"></i>   </a>
            
                {{-- BOTON ELIMINAR --}}
                <a href="{{ route('producto.show',$producto->id ) }}" class="btn btn-danger btn-sm">  <i class="fa fa-trash"></i>   </a>
                
                {{-- FIN BOTON ELIMINAR --}}
            
            </div>

            

        </td>
    </tr>

    @endforeach
    </tbody>
</table>


@section('scriptss')
    <script>
        $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    </script>
@endsection
@endsection