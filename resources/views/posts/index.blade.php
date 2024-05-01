<x-app-layout>

    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
            @foreach($posts as $post)
                    <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url({{ $post->image ? Storage::url($post->image->url) : 'https://cdn.pixabay.com/photo/2023/05/23/07/05/royal-gramma-basslet-8012082_1280.jpg' }})">
                        <div class="w-full h-full px-8 flex flex-col justify-center">     
                            
                            <div>
                                @foreach ($post->tags as $tag)                     
                                    <!-- Apply bg-color classes dynamically based on tag color -->
                                    <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{ $tag->color }}-600 text-white rounded-full">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                            
                            <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                                <a href="{{route('posts.show', $post)}}">
                                    {{ $post->name }}
                                </a>
                            </h1>
                        </div>
                    </article>
            @endforeach
        
        </div>

        <br>

         <!-- method for list pagination -->

        <div class="pagination" style ="mt-4">
            {{ $posts->links() }}
        </div>

    </div>
</x-app-layout>

