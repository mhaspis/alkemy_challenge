@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Listado de operaciones</strong></div>
                    <div class="card-body">
                        <div class="table">
                            <div class='row'>                               
                                <div class='col-md-1'><strong>N°</strong></div>
                                <div class='col-md-2'><strong>Concepto</strong></div>
                                <div class='col-md-1'><strong>Monto</strong></div>
                                <div class='col-md-2'><strong>Fecha</strong></div>
                                <div class='col-md-2'><strong>Tipo operacion</strong></div>
                                <div class='col-md-2'><strong>Usuario</strong></div>
                                <div class='col-md-2'><strong>Acciones</strong></div>                               
                            </div>
                            <hr>
                            @foreach($operations as $operation)
                            <div class='row'>
                                <div class='col-md-1'>{{ $operation->id}}</div>
                                <div class='col-md-2'>{{ $operation->concept_operation}}</div>
                                <div class='col-md-1'>${{ $operation->amount_operation}}</div>
                                <div class='col-md-2'>{{ $operation->date_operation}}</div>
                                <div class='col-md-2'>{{($operation->type_operation == 'entry')? 'Ingreso':'Egreso'}}</div>
                                <div class='col-md-2'>{{ $operation->user->name.' '.$operation->user->surname}}</div>
                                <div class='col-md-2'>
                                    <div class="actions">
                                        <a href="{{ route('operation.edit', ['id' => $operation->id]) }}" class="btn btn-sm btn-primary">Modificar</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">Eliminar</button>

                                        <div class="modal" id="myModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">¿Estas seguro?</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Si elimina esta operacion nunca podrás recuperarla, ¿estas seguro de querer borrarla?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                                        <a href="{{ route('operation.delete', ['id' => $operation->id]) }}" class="btn btn-danger">Borrar definitivamente</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                          
                            </div>
                            <hr>
                            @endforeach
                        </div>                                   
                    </div>
            </div>

        </div>
    </div>
</div>

@endsection