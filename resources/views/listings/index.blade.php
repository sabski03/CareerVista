<x-layout>

    @include('partials._hero')
    @if(session('success'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-green-100 border border-green-400 text-green-700 px-48 py-3">
            {{ session('success') }}
        </div>
    @endif
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless(count($listings)==0)
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing"/>
            @endforeach
        @else
            <p class="bg-red-100 border border-red-400 text-red-700  px-4 py-3" >No Listings Found</p>
        @endunless

    </div>

    <div class="mt-6 p-4">
        {{$listings->links()}}
    </div>


</x-layout>
