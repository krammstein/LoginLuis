@extends('app')

@section('content')

<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <h1>Crear Usuario</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('user.store') }}" method="post">
                @csrf

                <div class="col-12 mb-2">
                    <label for="">Email *</label>
                    <input type="email" name="email" class="form-control" required />
                </div>

                <div class="col-12 mb-2">
                    <label for="">Nombre *</label>
                    <input type="text" name="name" class="form-control" required />
                </div>

                <div class="col-12 mb-2">
                    <label for="">Password *</label>
                    <input type="password" name="password" class="form-control" required />
                </div>

                <button type="submit" class="btn btn-primary">Crear Usuario</button>

                <a href="{{ route('user.login') }}" class="btn btn-info">Atrás</a>

                @if (isset($_GET['success']) and (int)$_GET['success'] == 1)
                    <div class="alert alert-success mt-5" role="alert">
                        El usuario se creó correctamente !!
                    </div>
                @endif
                
            </form>
        </div>
    
    </div>
</div>

@endsection