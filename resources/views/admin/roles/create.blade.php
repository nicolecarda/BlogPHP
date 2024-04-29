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

                <div class="form-group" style="padding-left:7px">
                    <label for="name">Name</label>
                    <input class="form-control"  type="text" id="name" name="name" placeholder="Enter the role's name">
                
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                
                </div>

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

@section('css')



@stop

@section('js')

    <script src="{{ asset('jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
            $(document).ready( function() {
                $("#name").stringToSlug({
                    setEvents: 'keyup keydown blur',
                    getPut: '#slug',
                    space: '-'
                });
            });

            ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );

        document.getElementById("file").addEventListener('change', changeImage);
           function changeImage(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
           }

    </script>

@endsection



 




