<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:headerTitle>{{ $headerTitle }}</x-slot:headerTitle>
    <div class="p-14 flex flex-col gap-7">
        <div class="relative">
            <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-t-[2rem]"></div>
            <div class="relative rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-t-[calc(2rem+1px)]">
                <div class="p-7 sm:px-10 sm:pt-10">
                    {{-- @if ($item->category->name === 'Web Design')
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
                             <div class="px-1 py-0.5 bg-green-100 rounded">
                                    <a class="text-xs"
                                        href="/blog?category={{ $item->category->slug }}">{{ $item->category->name }}</a>
                                </div> 
                            <p class="text-sm">{{ $item['created_at']->diffForHumans() }}</p>
                        </div>
                    @endif --}}
                    {{-- <p class="text-lg font-medium tracking-tight text-gray-950 max-lg:text-center"><a
                            href="/post/{{ $post['slug'] }}">{{ $post['title'] }}</a></p> --}}
                    {{-- <p class="mt-2 max-w-lg text-sm/6 text-gray-600 max-lg:text-center">Lorem ipsum, dolor sit amet
                          consectetur adipisicing elit maiores impedit.</p> --}}
                    <p class="text-gray-600">{{ $post['body'] }}</p>
                    <p class="mt-4 text-gray-600">By {{ $post->author->name }}</p>
                    <p class="mt-2">
                        <a href="/blog" class="text-blue-600 hover:text-blue-700">Back to blog</a>
                    </p>
                </div>
            </div>
            <div
                class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 max-lg:rounded-t-[2rem]">
            </div>
        </div>
    </div>
</x-layout>
