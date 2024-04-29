@extends('adminlte::page')

@section('title', 'List')

@section('content_header')
    <h1> Create Posts </h1>
@stop


@section('content')

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                @csrf 

                <div class="form-group" style="padding-left:7px">
                    <label for="name">Name</label>
                    <input class="form-control"  type="text" id="name" name="name" placeholder="Enter the post's name">
                
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                
                </div>

                <div class="form-group" style="padding-left:7px">
                    <label for="slug">Slug</label>
                    <input class="form-control"  type="text" id="slug" name="slug" readonly>
                </div>

                 
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group" style="padding-left:7px">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control" >
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group" style="padding-left:7px">
                    <label for="tag_id">Tag</label>
                        @foreach($tags as $tag)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tag_id[]" id="tag_{{ $tag->id }}" value="{{ $tag->id }}">
                            <label class="form-check-label" for="tag_{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                        @endforeach                   
                </div>

                

                @error('tag_id')
                <br>
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group" style="padding-left:7px">
                    <p class="font-weight-bold">Status</p>
                    <label>
                        <input type="radio" name="status" value="1">
                        Draft
                    </label>
                    <label>
                        <input type="radio" name="status" value="2">
                        Published
                    </label>
                </div>

              

                @error('status')
                <br>
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="row mb-3">
                    <div class="col">
                        <div class="image-wrapper">
                        <img id="picture" src="https://cdn.pixabay.com/photo/2023/05/23/07/05/royal-gramma-basslet-8012082_1280.jpg" alt="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="file">Image that will be displayed in the post</label>
                            <input class="form-control-file"  type="file" id="file" name="file" accept="image/*">
                            @error('file')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                </div>

               

                <div class="form-group" style="padding-left:7px">
                    <label for="extract">Extract</label>
                    <textarea class="form-control"  id="extract" name="extract"></textarea>
                </div>

                @error('extract')
                <span class="text-danger">{{$message}}</span>
                @enderror
                
                <div class="form-group" style="padding-left:7px">
                    <label for="body">Post Body</label>
                    <textarea class="form-control" id="body" name="body"></textarea>
                </div>
                
                @error('body')
                <span class="text-danger">{{$message}}</span>
                @enderror


                <div class="form-group" style="padding-left:7px">
                    <button class="btn btn-primary mt-2" type="submit">Create New Post</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')

<style>
    .image-wrapper {
        width: 100%;
        height: auto; /* Mantén la altura automática para preservar la proporción de la imagen */
    }

    .image-wrapper img {
        width: 100%; /* Asegura que la imagen ocupe todo el ancho del contenedor */
        height: auto; /* Mantiene la proporción de la imagen */
    }
</style>

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



 




