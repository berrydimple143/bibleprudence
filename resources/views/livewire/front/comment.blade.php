<div>
    <h2 class="text-2xl font-bold mt-5 shadow-lg w-full sm:w-1/2">Comments</h2>    
    @if($comments->count())
        <div class="mt-3 flex flex-col gap-2">
            @foreach($comments as $comment)
                <p>{{ $comment->body }}</p>
            @endforeach
        </div>
    @else
        <p class="my-3 text-red-400">No comments yet for this blog post.</p>
    @endif
    <div  class="flex flex-col mt-3 gap-3">
        <textarea wire:model="body" rows="7" class="w-full sm:w-1/2 p-2 border-2 border-gray-400 border-dotted" name="body" id="body"></textarea>        
        <div class="flex w-full sm:w-1/2 gap-3">
            <button wire:click="reply" class="px-4 py-2 bg-green-500 text-white">Submit</button>
            <button class="px-4 py-2 bg-orange-400 text-white">Like</button>
        </div>
    </div>
</div>
