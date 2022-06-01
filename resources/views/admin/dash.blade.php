@php
    use App\Models\User;
@endphp

@extends('../app')

@section('content')

<div class="container pt-5">
    
    <div class="row">
        <div class="col-12">
            <h1>Wellcome to Dashboard</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <a href="{{ route('user.logout') }}" class="btn btn-info">Close my Sesion</a>

            <a href="{{ route('user.profile') }}" class="btn btn-info"> Edit my Profile</a>
        </div>
    </div>

    <div class="row">

        <div class="col-12">
            <h2>All Users</h2>
            
            <table class="table table-light table-bordered table-hover">

                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Creado</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{$item->email}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->created_at->format('d/M/Y H:i')}}</td>
                            <td>
                                <form action="{{ route('user.changeStatus') }}" method="post">
                                @csrf
                                @method('put')

                                <input type="hidden" name="serial" value="{{ encrypt($item->id) }}" />
                                <input type="hidden" name="page" value="{{ request('page') }}" />

                                    <div class="form-group">

                                        <select class="form-control field-status" name="status" required>
                                            <option value="" >Select an option</option>

                                            @foreach (User::$status as $val => $text)
                                                <option value="{{$val}}" {{ ($val == $item->status ? 'selected' : null) }}>{{$text}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                </form>
                                
                            </td>
                        </tr>    
                    @endforeach
                    
                </tbody>
            </table>

            {{ $items->links() }}
        </div>
    
    </div>
</div>

<script>

    class List{

        constructor(){
            this.selects = document.querySelectorAll('.field-status');
            this.init();
        }

        init(){
            this.selects.forEach((item) => {

                item.addEventListener('change', () => {
                    this.changeStatus(item);
                });

            });
        }

        changeStatus(item){
            let form = item.parentElement.parentElement;
            form.submit();
        }
    }

    const app = new List;
</script>

@endsection