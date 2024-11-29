<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:headerTitle>{{ $headerTitle }}</x-slot:headerTitle>
    <form class="flex justify-end mt-7 pr-14">
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <div>
            <label for="search-bar" class="sr-only">Search Article</label>
            <input id="search-bar" name="search" type="text" autocomplete="off"
                class="min-w-0 flex-auto w-80 rounded-md border-1 border-gray-500 px-3.5 py-2 text-gray-950 shadow-sm bg-white focus:outline-0 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm/6"
                placeholder="Search article">
            <button type="submit"
                class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Search</button>
        </div>
    </form>
    <div class="p-14 grid grid-cols-1 md:grid-cols-2 gap-7">
        @forelse ($posts as $item)
            <div class="relative">
                <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-t-[2rem]"></div>
                <div class="relative rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-t-[calc(2rem+1px)]">
                    <div class="p-7 sm:px-10 sm:pt-10">
                        @if ($item->category->name === 'Web Design')
                            <div class="flex justify-between mb-3">
                                <div class="badge badge-primary"><a class="text-xs"
                                        href="/blog?category={{ $item->category->slug }}">{{ $item->category->name }}</a>
                                </div>
                                <p class="text-sm">{{ $item['created_at']->diffForHumans() }}</p>
                            </div>
                        @endif
                        @if ($item->category->name === 'Data Structure')
                            <div class="flex justify-between mb-3">
                                <div class="badge badge-neutral"><a class="text-xs"
                                        href="/blog?category={{ $item->category->slug }}">{{ $item->category->name }}</a>
                                </div>
                                <p class="text-sm">{{ $item['created_at']->diffForHumans() }}</p>
                            </div>
                        @endif
                        @if ($item->category->name === 'Machine Learning')
                            <div class="flex justify-between mb-3">
                                <div class="badge badge-secondary"><a class="text-xs"
                                        href="/blog?category={{ $item->category->slug }}">{{ $item->category->name }}</a>
                                </div>
                                <p class="text-sm">{{ $item['created_at']->diffForHumans() }}</p>
                            </div>
                        @endif
                        @if ($item->category->name === 'UI UX')
                            <div class="flex justify-between mb-3">
                                <div class="badge badge-accent"><a class="text-xs"
                                        href="/blog?category={{ $item->category->slug }}">{{ $item->category->name }}</a>
                                </div>
                                {{-- <div class="px-1 py-0.5 bg-green-100 rounded">
                                    <a class="text-xs"
                                        href="/blog?category={{ $item->category->slug }}">{{ $item->category->name }}</a>
                                </div> --}}
                                <p class="text-sm">{{ $item['created_at']->diffForHumans() }}</p>
                            </div>
                        @endif
                        <p class="text-lg font-medium tracking-tight text-gray-950 max-lg:text-center"><a
                                href="/post/{{ $item['slug'] }}">{{ $item['title'] }}</a></p>
                        {{-- <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">Lorem ipsum, dolor sit amet
                            consectetur adipisicing elit maiores impedit.</p> --}}
                        <p class="mt-2 text-gray-600">By <a
                                href="/blog?author={{ $item->author->slug }}">{{ $item->author->name }}</a></p>
                        {{-- <p class="mt-2 text-gray-600">By: <a
                                href="/blog?author={{ $item->author->slug }}">{{ $item->author->name }}</a>
                            in <a href="/blog?category={{ $item->category->slug }}">{{ $item->category->name }}</a> |
                            {{ $item['created_at']->diffForHumans() }}</p> --}}
                        <p class="text-gray-600 min-h-[72px]">{{ Str::limit($item['body'], 150, '...') }}</p>
                        <p class="mt-1">
                            <a href="/post/{{ $item['slug'] }}" class="text-blue-600">Read more</a>
                        </p>
                    </div>
                </div>
                <div
                    class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 max-lg:rounded-t-[2rem]">
                </div>
            </div>
        @empty
            <p>Articles not found</p>
        @endforelse
    </div>

    <div class="px-14 pb-14">
        {{ $posts->links() }}
    </div>
</x-layout>
