<!-- table for showing the categories list -->

@extends('adminlte::page')

@section('title', 'List')

@section('content_header')
    <h1> Categories' List </h1>
@stop


@section('content')

<!-- message shown if the category is created ok -->

@if (@session('info'))

    <div class="alert alert-success">
        <strong>{{session('info') }}</strong>
    </div>
    
@endif


    <div class='card'>
        <div class='card-header'>
            @can('admin.categories.create') <!-- can verifies if the user has access to the add category button -->
            <a class="btn btn-success btn-sm float-right" href="{{route('admin.categories.create')}}">Add Category</a>
            @endcan
            
        </div>
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
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="10px">
                                @can('admin.categories.edit') <!-- can verifies if the user has access to the edit button -->
                                <a class="btn btn-primary btn-sm" href="{{route('admin.categories.edit', $category)}}">Edit</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.categories.destroy') <!-- can verifies if the user has access to the delete category button -->
                                <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
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



 
