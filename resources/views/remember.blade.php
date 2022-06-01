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
            <form action="{{ route('user.rememberPass') }}" method="post">
                @csrf

                <div class="col-12 mb-2">
                    <label for="">Email *</label>
                    <input type="email" name="email" class="form-control" required />
                </div>

                <button type="submit" class="btn btn-primary">Send</button>

                <a href="{{ route('user.login') }}" class="btn btn-info">Back to Login</a>

                @if (isset($_GET['success']))
                    <div class="alert alert-{{ (request('success') == 1 ? 'success' : 'danger') }} mt-5" role="alert">
                        {{ (request('success') == 1 ? 'We sent you to your email the new Password' : request('err') ) }}
                    </div>
                @endif

            </form>
        </div>
    
    </div>
</div>

@endsection