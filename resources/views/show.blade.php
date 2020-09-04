@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $movie['poster_path'] }}" alt="parasite" class="sm:w-64 md:w-96">
            <div class="sm:ml-8 md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg"><path d="M23.363 8.584l-7.378-1.127L12.678.413c-.247-.526-1.11-.526-1.357 0L8.015 7.457.637 8.584a.75.75 0 00-.423 1.265l5.36 5.494-1.267 7.767a.75.75 0 001.103.777L12 20.245l6.59 3.643a.75.75 0 001.103-.777l-1.267-7.767 5.36-5.494a.75.75 0 00-.423-1.266z" fill="#ffc107"/></svg>
                    <span class="ml-1"> {{$movie['vote_average']*10 . '%'}} </span>
                    <span class="mx-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach($movie['genres'] as $genre)
                            {{ $genre['name'] }}
                            @if(!$loop->last),
                            @endif
                        @endforeach
                    </span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{ $movie['overview'] }}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        @foreach($movie['credits']['crew'] as $crew)
                            @if($loop->index < 2)
                                <div class="mr-8">
                                    <div>{{ $crew['name'] }}</div>
                                    <p class="text-sm text-gray-400">{{ $crew['job'] }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div x-data="{ isOpen: false }">
                    <div class="mt-12">
                        <button
                            @click="isOpen = true"
                            class="flex inline-flexcursor-pointer items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600transition ease-in-out duration-150" target="_blank">
                            <svg class="w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 336 336"><path d="M286.8 49.2C256.4 18.8 214.4 0 168 0 121.6 0 79.6 18.8 49.2 49.2 18.8 79.6 0 121.6 0 168c0 46.4 18.8 88.4 49.2 118.8C79.6 317.2 121.6 336 168 336c46.4 0 88.4-18.8 118.8-49.2C317.2 256.4 336 214.4 336 168c0-46.4-18.8-88.4-49.2-118.8zm-14.4 223.2c-26.8 26.8-63.6 43.2-104.4 43.2s-77.6-16.4-104.4-43.2C37.2 245.6 20.4 208.8 20.4 168S36.8 90.4 63.6 63.6C90.4 36.8 127.2 20.4 168 20.4s77.6 16.4 104.4 43.2c26.8 26.8 43.2 63.6 43.2 104.4s-16.8 77.6-43.2 104.4z"/><path d="M261.2 156c-.8-.8-2-2.4-3.2-4l-.8-.8c-1.2-1.2-2.4-2-4-2.8l-59.2-34s-.4 0-.4-.4L134 79.6c-5.2-3.2-11.2-3.6-16.8-2.4-5.6 1.6-10.4 5.2-13.6 10.4-1.2 1.6-1.6 3.6-2.4 5.2-.4 1.2-.4 2.8-.8 4.4v139.6c0 6 2.4 11.6 6.4 15.6s9.6 6.4 15.6 6.4c2 0 4.4-.4 6.4-1.2s4-1.6 5.6-2.8l58.8-34 .8-.4 59.2-34c.4 0 .4-.4.8-.4 4.8-3.2 8.4-8 9.6-13.2 1.6-5.6.8-11.6-2.4-16.8zM244 168.4c0 .4-.4.8-.8.8h-.4L184 203.6l-.4.4-58.8 34c-.4 0-.4.4-.8.4 0 0-.4 0-.4.4h-.4c-.4 0-.8-.4-1.2-.4-.4-.4-.4-.8-.4-1.2V98.4c.4-.4.8-.8 1.2-.8h1.2l59.2 34 .4.4 59.6 34.4.4.4.4.4v1.2z"/></svg>
                            <span class="ml-2">Play Trailer</span>
                        </button>
                    </div>
                    <div
                        style="background-color: rgba(0, 0, 0, 0.5)"
                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                        x-show.transition.opacity="isOpen"
                        @click.away="isOpen = false"
                    >
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button class="text-3xl leading-none hover:text-gray-300" @click="isOpen = false">&times;</button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                        <iframe width="560" height="400" src={{"https://www.youtube.com/embed/".$movie['videos']['results'][0]['key']}}
                                                frameborder="0" class="responsive-iframe absolute top-0 left-0 w-full h-full"
                                                style="border:0;" allow="autoplay; encrypted-media" allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    end of details  --}}

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($movie['credits']['cast'] as $cast)
                    @if($loop->index < 5)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$cast['profile_path'] }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-lg-mt-2 hover:text-gray:300">
                                    {{ $cast['name'] }}
                                </a>
                                <div class="text-gray-400 text-sm">
                                    {{ $cast['character'] }}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="movie-cast" x-data="{ isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                @foreach($images as $image)
                    @if($loop->index < 9)
                        <div class="mt-4">
                            <a
                                @click.prevent="
                                    isOpen = true
                                    image='{{'https://image.tmdb.org/t/p/original/'. $image['file_path']}}'
                                "
                                href="#"
                            >
                                <img src="{{'https://image.tmdb.org/t/p/w500/'. $image['file_path']}}" alt="image" class="hover:opacity-75 transition
                                ease-in-out duration-150">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div
            style="background-color: rgba(0, 0, 0, 0.5)"
            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
            x-show="isOpen"
        >
            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                <div class="bg-gray-900 rounded">
                    <div class="flex justify-end pr-4 pt-2">
                        <button class="text-3xl leading-none hover:text-gray-300" @click.away="isOpen = false" @click="isOpen = false" @keydown.escape.window="isOpen = false">&times;</button>
                    </div>
                    <div class="modal-body px-8 py-8">
                        <img :src="image" alt="poster">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

