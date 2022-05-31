@extends('app')

@section('content')

<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <h1>Recordar Contraseña</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="" method="post">
                @csrf

                <div class="col-12 mb-2">
                    <label for="">Email *</label>
                    <input type="email" name="email" class="form-control" required />
                </div>

                <button type="submit" class="btn btn-primary">Enviar Instrucciones</button>


            </form>
        </div>
    
    </div>
</div>

@endsection