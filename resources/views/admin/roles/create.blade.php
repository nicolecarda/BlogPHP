<!-- form for creating roles -->

@extends('adminlte::page')

@section('title', 'List')

@section('content_header')
    <h1> Create Roles </h1>
@stop


@section('content')

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.roles.store') }}" enctype="multipart/form-data">
                @csrf 

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
                    <button class="btn btn-primary mt-2" type="submit">Create New Role</button>
                </div>
            </form>
        </div>
    </div>
@stop


 




