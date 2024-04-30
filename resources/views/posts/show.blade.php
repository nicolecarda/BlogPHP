<x-app-layout>

    <div class="container py-8">

        <h1 class="text-4xl font-bold text-gray-600"> {{ $post->name }}</h1>

        <div class="text-lg text-gray-500 mb-2 py-8">
            {!! $post->extract !!}
        </div>

        <div class="grid lg:grid-cols-2 gap-6">

         {{--    Principal Content  --}}

            
            <div class="lg:col-span-1">

                <figure>
                    @if($post->image)
                    <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="">
                    @else
                    <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2023/05/23/07/05/royal-gramma-basslet-8012082_1280.jpg" alt="">
                    @endif
                </figure>

                <div class="text-base text-gray-500 mt-4">
                    {!! $post->body !!}
                </div>

            </div>

            {{-- Related Content --}}

            <aside>

                <h1 class="text-2xl font-bold text-gray-600 mb-4 px-3"> More in {{ $post->category->name }}</h1>

                <ul>

                    @foreach($similar as $simil)
                        <li class="mb-4">
                            <a class="flex" href="{{route('posts.show', $simil)}}">
                                
                                @if($simil->image)
                                    <img class="w-36 h-20 object-cover object-center" src="{{ Storage::url($simil->image->url) }}" alt="">
                                @else
                                    <img class="w-36 h-20 object-cover object-center" src="https://cdn.pixabay.com/photo/2023/05/23/07/05/royal-gramma-basslet-8012082_1280.jpg" alt="">
                                @endif

                                <span class="ml-2 text-gray-600">{{$simil->name}}</span>
                            </a>
                        </li>
                    @endforeach

                </ul>

            </aside>

        </div>
    </div>

</x-app-layout>

