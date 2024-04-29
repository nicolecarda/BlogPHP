<div class="card">

    <div class="card-header">
        <input wire:model.live='search' type="text" class="form-control" placeholder="Enter the posts' name">
    </div>

    @if ($posts->count())        {{-- cosulta si hay posts --}}
   
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan=2></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td with="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit',$post)}}">Edit</a>
                        </td>
                        <td with="10px">
                            <form action="{{route('admin.posts.destroy',$post)}}" method="POST">
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

    <br> 

    <div class="card-footer" >
        {{$posts->links()}}
    </div>

    @else
        <div class="card-body">There's nothing registered</div>   
    @endif

</div>
