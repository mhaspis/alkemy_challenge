@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    @if(isset($operation))
                    <div class="card-header">Modificar operación</div>
                    @else
                    <div class="card-header">Crear nueva operación</div>
                    @endif
                    <div class="card-body">
                            @if(isset($operation))
                            <form method="POST" action="{{ route('operation.update') }}">
                                
                            @else
                            <form method="POST" action="{{ route('operation.save') }}">
                                
                            @endif
                                @csrf
                                                            
                                    <input type="hidden" name="operation_id" value="{{isset($operation)? $operation->id : ''}}" />
                                    
                                    <div class="form-group row">
                                            <label for="concept_operation" class="col-md-3 col-form-label text-md-right">Concepto</label>
                                            <div class="col-md-7">
                                                <input id="concept_operation" type="text" name="concept_operation" class="form-control" value='{{isset($operation)? $operation->concept_operation : ''}}' required/>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="amount_operation" class="col-md-3 col-form-label text-md-right">Monto</label>
                                            <div class="col-md-7">
                                                    <input id="amount_operation" type="number" name="amount_operation" class="form-control" value='{{isset($operation)? $operation->amount_operation : ''}}' required/>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="date_operation" class="col-md-3 col-form-label text-md-right">Fecha Operación</label>
                                            <div class="col-md-7">
                                                    <input id="date_operation" type="date" name="date_operation" class="form-control" value='{{isset($operation)? $operation->date_operation : ''}}' required/>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="type_operation" class="col-md-3 col-form-label text-md-right">Tipo Operación</label>
                                            <div class="col-md-7">
                                                <select name="type_operation" class="form-control" id="type_operation" data-dependent="operation">
                                                    @if(isset($operation) && $operation->type_operation == 'entry')
                                                    <option value="" disabled>--- Seleccionar tipo de operación ---</option>
                                                    <option value='entry' selected disabled> Ingreso</option>
                                                    <option value='egress' disabled>Egreso</option>
                                                    @elseif (isset($operation) && $operation->type_operation == 'egress')
                                                    <option value="" disabled>--- Seleccionar tipo de operación ---</option>
                                                    <option value='entry' disabled> Ingreso</option>
                                                    <option value='egress' selected disabled>Egreso</option>
                                                    @else
                                                    <option value="">--- Seleccionar tipo de operación ---</option>
                                                    <option value="entry"> Ingreso</option>
                                                    <option value="egress"> Egreso</option>
                                                    @endif
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label text-md-right">Categoria</label>
                                        <div class="col-md-7">
                                            <select name="category_id" class="form-control" id="category_id" data-dependent="category">
                                                <option value="">--- Seleccionar una categoria ---</option>
                                                @foreach($categories as $category)
                                                    @if(isset($operation) && ($operation->category_id) == $category->id)
                                                    <option value='{{$operation->category_id}}' selected>{{ $operation->category->name_category }}</option>    
                                                    @else
                                                    <option value='{{$category->id}}'>{{ $category->name_category }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>             
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-3">
                                            @if(isset($operation))
                                            <input type="submit" class="btn btn-primary" value="Modificar Operación">
                                            @else
                                            <input type="submit" class="btn btn-primary" value="Grabar Operación">
                                            @endif
                                        </div>
                                    </div>
                            </form>
                    </div>
            </div>

        </div>
    </div>
</div>

@endsection