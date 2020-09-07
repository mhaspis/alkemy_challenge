@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Balance General</strong></div>
                    <div class="card-body">
                    @if(isset($currentBalance))
                        <h1>${{ $currentBalance }}</h1>
                    @endif                                      
                    </div>
            </div>
            <br />
            <div class="card">
                <div class="card-header"><strong>Últimos 10 movimientos de cuenta</strong></div>
                    <div class="card-body">
                        <div class="table">
                            <div class='row'>                               
                                <div class='col-md-1'><strong>N°</strong></div>
                                <div class='col-md-2'><strong>Concepto</strong></div>
                                <div class='col-md-1'><strong>Monto</strong></div>
                                <div class='col-md-2'><strong>Fecha</strong></div>
                                <div class='col-md-2'><strong>Tipo operacion</strong></div>
                                <div class='col-md-2'><strong>Usuario</strong></div>                             
                            </div>
                            <hr>
                            @foreach($operations as $operation)
                                @if($countOperations<10)
                                <div class='row'>
                                    <div class='col-md-1'>{{ $operation->id}}</div>
                                    <div class='col-md-2'>{{ $operation->concept_operation}}</div>
                                    <div class='col-md-1'>${{ $operation->amount_operation}}</div>
                                    <div class='col-md-2'>{{ $operation->date_operation}}</div>
                                    <div class='col-md-2'>{{($operation->type_operation == 'entry')? 'Ingreso':'Egreso'}}</div>
                                    <div class='col-md-2'>{{ $operation->user->name.' '.$operation->user->surname}}</div>
                                </div>
                                <hr>
                                @php
                                $countOperations++;
                                @endphp
                                @endif
                            @endforeach
                        </div>                                                     
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection