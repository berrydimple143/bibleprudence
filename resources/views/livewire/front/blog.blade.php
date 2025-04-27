<div class="flex flex-col text-gray-900 py-3">
    <livewire:front.blog-menu></livewire:front.blog-menu>
    <br>
    @if($blogs->count())
        @foreach($blogs as $blog)
            <livewire:front.blog-item :blog="$blog" wire:key="{{ $blog->id }}">
            </livewire:front.blog-item>
        @endforeach
        {{ $blogs->links() }}
    @elseif($count > 0)
        <p class="font-bold text-2xl text-red-500 flex flex-row min-h-screen justify-center items-center">No blogs posted yet for this search item... Please bear with us!</p>
    @else
        <p class="font-bold text-2xl text-red-500 flex flex-row min-h-screen justify-center items-center">No blogs posted yet... Please bear with us!</p>
    @endif
</div>
