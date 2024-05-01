<!-- form for creating tags -->

@extends('adminlte::page')

@section('title', 'List')

@section('content_header')
    <h1> Create Tags </h1>
@stop


@section('content')

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.tags.store') }}">
                @csrf <!-- CSRF protection -->

                <div class="form-group" style="padding-left:7px">
                    <label for="name">Name</label>
                    <input class="form-control" style="width: 50%" type="text" id="name" name="name" placeholder="Enter the tag's name">
                
                     <!-- validation message for name-->

                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                
                </div>
                
                <div class="form-group" style="padding-left:7px">
                    <label for="slug">Slug</label>
                    <input class="form-control" style="width: 50%"  type="text" id="slug" name="slug" placeholder="Enter the tag's slug" readonly>
                </div>
                
                 <!-- validation message for slug-->
                 
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                
                
                <div class="form-group" style="padding-left:7px">
                    <label for="color">Color</label>
                    <select name="color" id="" class="form-control">
                        <option value="red">Red</option>
                        <option value="green">Green</option>
                        <option value="blue">Blue</option>
                        <option value="indigo">Indigo</option>
                        <option value="pink">Pink</option>
                        <option value="yellow">Yellow</option>
                        <option value="purple">Purple</option>
                    </select>
                </div>

                <div class="form-group" style="padding-left:7px">
                    <button class="btn btn-primary mt-2" type="submit">Create Tag</button>
                </div>

            </form>
        </div>
    </div>
@stop

@section('js')  

    <script src="{{ asset('jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    
    <script>

    /*script for creating the category slug authomatically*/

            $(document).ready( function() {
                $("#name").stringToSlug({
                    setEvents: 'keyup keydown blur',
                    getPut: '#slug',
                    space: '-'
                });
            });
    </script>

@endsection



 




