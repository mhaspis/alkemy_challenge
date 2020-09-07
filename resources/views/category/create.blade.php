@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="card-header">Crear nueva categoria</div>
                    <div class="card-body">
                            <form method="POST" action="{{ route('category.save') }}">
                                    @csrf

                                    <div class="form-group row">
                                            <label for="name_category" class="col-md-3 col-form-label text-md-right">Nombre Categoria</label>
                                            <div class="col-md-7">
                                                    <input id="name_category" type="text" name="name_category" class="form-control" required/>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-3">
                                                <input type="submit" class="btn btn-primary" value="Grabar Categoria">
                                        </div>
                                    </div>
                            </form>
                    </div>
            </div>

        </div>
    </div>
</div>

@endsection