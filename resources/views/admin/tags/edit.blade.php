@extends('adminlte::page')

@section('title', 'Edit')

@section('content_header')
    <h1> Edit Tags </h1>
@stop


@section('content')

@if (@session('info'))

    <div class="alert alert-success">
        <strong>{{session('info') }}</strong>
    </div>
    
@endif


<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.tags.update', $tag) }}">
      
            @csrf <!-- CSRF protection -->

            @method('PUT')           

            <div class="form-group" style="padding-left:7px">
                <label for="name">Name</label>
                <input class="form-control" style="width: 50%" type="text" id="name" name="name" value="{{ $tag->name }}">
            
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
            
            </div>
            
            <div class="form-group" style="padding-left:7px">
                <label for="slug">Slug</label>
                <input class="form-control" style="width: 50%"  type="text" id="slug" name="slug" readonly value="{{ $tag->name }}">
            </div>
            
             
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
                <button class="btn btn-primary mt-2" type="submit">Update Tag</button>
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

 
