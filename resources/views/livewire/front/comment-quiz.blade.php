<div class="flex flex-col p-3 space-y-2 sm:w-full md:w-full lg:w-1/3 border border-gray-700 border-dashed">
    <p class="font-bold">Comments:</p>
    @if($quiz->comments()->count())
    @foreach ($quiz->comments as $comment)
        @if($comment->status == 1)
            <div class="flex flex-col items-start pl-2">
                <span class="text-green-600 font-bold">{{ $comment->author }}:</span> {{ $comment->message }}
            </div>
        @endif
    @endforeach
    @else
    No comments yet ...
    @endif

    <div class="flex gap-1 items-center">
        <label for="author" class="sr-only">Name:</label>
        <input class="p-2 border border-green-900 grow @error('author') border-red-500 @enderror" type="text"
            name="author" wire:model="author" id="author" placeholder="Type your name here ...">
    </div>
    @error('author')
    <div class="text-red-500">{{ $message }}</div>
    @enderror
    <div class="flex gap-1 items-start">
        <label for="message" class="sr-only">Comment:</label>
        <textarea class="border border-green-900 w-full p-2  @error('author') border-red-500 @enderror"
            placeholder="Type your comment for this question or answer here ..." class="grow" name="message"
            wire:model="message" id="message" rows="5"></textarea>
    </div>
    @error('message')
    <div class="text-red-500">{{ $message }}</div>
    @enderror
    <div class="flex flex-wrap items-center space-x-2">
        <div wire:click="save"
            class="w-15 cursor-pointer flex gap-1 items-center text-white text-sm bg-green-500 p-1 border border-green-900 shrink">
            <span>Save</span>
        </div>
        <div wire:click="commentOff"
            class="w-18 cursor-pointer flex gap-1 items-center text-white text-sm bg-teal-800 p-1 border border-green-900 shrink">
            <span>Cancel</span>
        </div>
    </div>
</div>
