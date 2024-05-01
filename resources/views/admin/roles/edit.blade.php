<!-- form for editing roles-->

@extends('adminlte::page')

@section('title', 'List')

@section('content_header')
    <h1> Update Roles </h1>
@stop


@section('content')

<!-- message shown if the category is updated ok -->

@if (@session('info'))

    <div class="alert alert-success">
        <strong>{{session('info') }}</strong>
    </div>
    
@endif

    <div class="card">
        <div class="card-body">
            <form model method="POST" action="{{ route('admin.roles.update', $role) }}" enctype="multipart/form-data">
                @csrf 

                @method('PUT') 

                <h2 class="h3">Permissions List</h2>

                @foreach ($permissions as $permission)
                <div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}">
                            <label class="form-check-label" for="permission_{{ $permission->id }}">
                                {{ $permission->description }}
                            </label>
                        </div>
                        @endforeach                   
                </div>

                <!-- validation message for permission ID -->

                @error('permission_id')
                <br>
                <span class="text-danger">{{$message}}</span>
                @enderror

               


                <div class="form-group" style="padding-left:7px">
                    <button class="btn btn-primary mt-2" type="submit">Update Role</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

    
@endsection



 




