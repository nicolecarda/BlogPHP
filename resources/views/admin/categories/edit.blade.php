<!-- form for editing categories -->

@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1> Edit Categories </h1>
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
        <form method="POST" action="{{ route('admin.categories.update', $category) }}">
      
            @csrf <!-- CSRF protection -->

            @method('PUT')

           

            <div class="form-group" style="padding-left:7px">
                <label for="name">Name</label>
                <input class="form-control" style="width: 50%" type="text" id="name" name="name" value="{{ $category->name }}">
            
                <!-- validation message for name -->

            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
            
            </div>


            <div class="form-group" style="padding-left:7px">
                <label for="slug">Slug</label>
                <input class="form-control" style="width: 50%"  type="text" id="slug" name="slug" readonly value="{{ $category->name }}">
            </div>

            <!-- validation message for slug -->
             
            @error('slug')
                <span class="text-danger">{{$message}}</span>
            @enderror

             

            <div class="form-group" style="padding-left:7px">
                <button class="btn btn-primary mt-2" type="submit">Update Category</button>
            </div>


        </form>
    </div>
</div>
@stop

@section('js') <!-- script for creating the category slug authomatically-->

    <script src="{{ asset('jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    
    <script>
            $(document).ready( function() {
                $("#name").stringToSlug({
                    setEvents: 'keyup keydown blur',
                    getPut: '#slug',
                    space: '-'
                });
            });
    </script>

@endsection

 
