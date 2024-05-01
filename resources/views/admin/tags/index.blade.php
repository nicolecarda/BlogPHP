<!-- table for showing the tags list -->

@extends('adminlte::page')

@section('title', 'List')

@section('content_header')
    @can('admin.tags.create')
    <a class="btn btn-success float-right" href="{{route('admin.tags.create')}}">Add Tag</a>
    @endcan
    <h1> Tags' List </h1>
    
@stop

@section('content')

<!-- message shown if the tag is created ok -->

@if (@session('info'))

    <div class="alert alert-success">
        <strong>{{session('info') }}</strong>
    </div>
    
@endif


    <div class='card'>
      
        <div class='card-body'>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td width="10px">
                                @can('admin.tags.edit') <!-- can verifies if the user has access to the edit button -->
                                <a class="btn btn-primary btn-sm" href="{{route('admin.tags.edit', $tag)}}">Edit</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.tags.destroy') <!-- can verifies if the user has access to the delete button -->
                                <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
    </div>
@stop



 
