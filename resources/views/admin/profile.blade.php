@extends('../app')

@section('content')

<div class="container pt-5">
    
    <div class="row">
        <div class="col-12">
            <h1>Edit your Profile</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <a href="{{ route('user.dash') }}" class="btn btn-info">Atrás</a>

        </div>
    </div>

    <div class="row">

        <div class="col-12">
            
            <form action="{{ route('user.update') }}" method="post">
                @csrf
                @method('put')

                <div class="form-group mb-2">
                    <label for="">
                        <input type="checkbox" class="check-to-change" data-target="#field-email" name="email_change" value="1" />
                        Change email
                    </label>
                    <input class="form-control" id="field-email" type="email" name="email" value="{{ old('email', $user->email) }}" required disabled />
                    @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    
                    <label for="">
                        <input type="checkbox" class="check-to-change" data-target="#field-pass, #field-re-pass" name="password_change" value="1" />
                        Change Password
                    </label>

                    <input class="form-control" id="field-pass" type="password" name="password" required disabled />

                    @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                </div>

                <div class="form-group mb-5">

                    <input class="form-control" id="field-re-pass" type="password" name="password_confirmation" placeholder="Re Password" required disabled />
                    
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save Profile</button>

                @if (isset($_GET['success']) and $_GET['success'] == 1)
                    <div class="alert alert-success mt-5">Profile is updated !</div>
                @endif

            </form>
        </div>
    
    </div>
</div>

<script>

class Profile{

    constructor(){
        this.checks = document.querySelectorAll('.check-to-change');
        this.init();
    }    

    init(){
        this.checks.forEach( (item) => {
            item.addEventListener('click', () => {
                this.check(item);
            });
        });
    }

    check(item){
        let targets = document.querySelectorAll(item.getAttribute('data-target'));

        targets.forEach((input) => {
            input.disabled = !item.checked;    
        });
    }
}

const app = new Profile;
</script>

@endsection