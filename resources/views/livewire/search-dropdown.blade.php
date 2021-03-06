<div class="relative mt-3 md:mt-0" x-data="{isOpen: true}" @click.away="isOpen = false">
    <input wire:model.debounce.500ms="search" type="text" class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
           placeholder="Search" @focus="isOpen = true" @keydown.escape.window="isOpen = false" @keydown.shift.tab="isOpen = false" @keydown="isOpen = true" x-ref="search" @keydown.window=" if(event.keyCode === 191) { event.preventDefault(); $refs.search.focus(); } ">
    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 511.999 511.999"><path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z"/></svg>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-4"></div>

    @if(strlen($search) >= 2)
        <div
            class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-4"
            x-show.transition.opacity="isOpen"
            @keydown.escape.window="isOpen = false"
        >
            <ul>
                @if($searchResults->count() > 0)
                    @foreach($searchResults as $movie)
                        <li class="border-b border-gray-700">
                            <a href="{{ route('movies.show', $movie['id']) }}" class="block hover:bg-gray-700 px-3 py-3 flex items-center"
                               @if($loop->last) @keydown.tab="isOpen = false" @endif
                            >
                                @if($movie['poster_path'])
                                    <img class="w-8" src={{"https://image.tmdb.org/t/p/w500/". $movie['poster_path']}} alt="poster">
                                @else
                                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                @endif
                                <span class="ml-4">{{ $movie['title'] }}</span>
                            </a>
                        </li>
                    @endforeach
                @else
                    <div class="px-3 py-3">No results found "{{ $search }}"</div>
                @endif
            </ul>
        </div>
    @endif
</div>
