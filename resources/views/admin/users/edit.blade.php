@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1> Role assignment  </h1>
@stop


@section('content')

@if (@session('info'))

    <div class="alert alert-success">
        <strong>{{session('info') }}</strong>
    </div>
    
@endif


<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.update', $user) }}">
      
            @csrf <!-- CSRF protection -->

            @method('PUT')

           

            <div class="form-group" style="padding-left:7px">
                <label for="name">Name</label>
                <input class="form-control" style="width: 50%" type="text" id="name" name="name" value="{{ $user->name }}">
            
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
            
            </div>

            <div class="form-group" style="padding-left:7px">
                <label for="role_id">Roles List</label>
                    @foreach($roles as $role)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->id }}">
                        <label class="form-check-label" for="role_{{ $role->id }}">
                            {{ $role->name }}
                        </label>
                    </div>
                    @endforeach                   
            </div>

            

            @error('role_id')
            <br>
            <span class="text-danger">{{$message}}</span>
            @enderror

             

            <div class="form-group" style="padding-left:7px">
                <button class="btn btn-primary mt-2" type="submit">Assign Role</button>
            </div>


        </form>
    </div>
</div>
@stop

@section('js')

   

@endsection

 
