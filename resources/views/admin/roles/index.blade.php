<!-- table for showing the roles list -->

@extends('adminlte::page')

@section('title', 'List')

@section('content_header')

    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.roles.create')}}">New Role</a>
    <h1> Roles List </h1>
@stop


@section('content')

<!-- message shown if the category is created ok -->

@if (@session('info'))

    <div class="alert alert-success">
        <strong>{{session('info') }}</strong>
    </div>
    
@endif

<div class="card">

    @if ($roles->count())        {{-- count checks if there are any posts --}}
   
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th colspan=2></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.roles.edit',$role)}}">Edit</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.roles.destroy',$role)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 

    

    @else
        <div class="card-body">There's nothing registered</div>   
    @endif

</div>


@stop



 
