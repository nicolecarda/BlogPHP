@extends('adminlte::page')

@section('title', 'List')

@section('content_header')
    <h1> Create Categories </h1>
@stop


@section('content')

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.categories.store') }}">
                @csrf <!-- CSRF protection -->

                <div class="form-group" style="padding-left:7px">
                    <label for="name">Name</label>
                    <input class="form-control" style="width: 50%" type="text" id="name" name="name" placeholder="Enter the category's name">
                
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                
                </div>

                <div class="form-group" style="padding-left:7px">
                    <label for="slug">Slug</label>
                    <input class="form-control" style="width: 50%"  type="text" id="slug" name="slug" placeholder="Enter the category's slug" readonly>
                </div>

                 
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group" style="padding-left:7px">
                    <button class="btn btn-primary mt-2" type="submit">Create Category</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')

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



 




