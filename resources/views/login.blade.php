@extends('app')

@section('content')

<div class="container pt-5">
    <div class="row">
        <div class="col-12">
            <h1>Login Principal</h1>
            <ul>
                <li>User: krammstein@gmail.com</li>
                <li>Pass: 12345678</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('user.doLogin') }}" method="post">
                @csrf

                <div class="col-12 mb-2">
                    <label for="">Email *</label>
                    <input type="email" name="email" class="form-control" required />
                </div>

                <div class="col-12 mb-2">
                    <label for="">Password *</label>
                    <input type="password" name="password" class="form-control" required />
                </div>

                <button type="submit" class="btn btn-primary">Hacer Login</button>

                <a href="{{ route('user.remember') }}" class="btn btn-info">Olvide Contraseña</a>

                <a href="{{ route('user.create') }}" class="btn btn-secondary" >Crear Usuario</a>

            </form>
        </div>
    
    </div>
</div>

@endsection