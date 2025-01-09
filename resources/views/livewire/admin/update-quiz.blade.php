<div class="w-full h-full p-5 bg-white flex flex-col gap-3 border border-green-400">
    <div class="flex flex-col gap-1">
        <div class="flex items-center gap-2 grow">
            <label for="question" class="font-bold text-lg">Question:</label>
            <input type="text" class="border border-green-400 p-2 outline-none grow" wire:model="question" id="question"
                name="question">
        </div>
        @error('question')
        <p class="text-red-500 pl-10">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="answer" class="font-bold text-lg">Answer:</label>
            <input type="text" class="border border-green-400 p-2 outline-none grow" wire:model="answer" id="answer"
                name="answer">
        </div>
        <div class="flex items-center gap-2 grow">
            <label for="verse" class="font-bold text-lg">Verse(s):</label>
            <input type="text" class="border border-green-400 p-2 outline-none grow" wire:model="verse" id="verse"
                name="verse">
        </div>
    </div>
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="level" class="font-bold text-lg">Level:</label>
            <select class="border border-green-400 p-3 outline-none grow" name="level" id="level" wire:model='level'>
                <option value="">Select a level here</option>
                <option value="Easy">Easy</option>
                <option value="Average">Average</option>
                <option value="Hard">Hard</option>
            </select>
        </div>
        <div class="flex items-center gap-2 grow">
            <label for="topic_id" class="font-bold text-lg">Topic:</label>
            <select class="border border-green-400 p-3 outline-none grow" name="topic_id" id="topic_id"
                wire:model='topic_id'>
                <option value="">Select a topic here</option>
                @foreach ($topics as $topic)
                <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="book_id" class="font-bold text-lg">Book:</label>
            <select class="border border-green-400 p-3 outline-none grow" name="book_id" id="book_id" wire:model='book_id'>
                <option value="">Select a book here</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                @endforeach
            </select>
            @error('book_id')
            <p class="text-red-500 pl-10">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center gap-2 grow">&nbsp;</div>
    </div>
    <div class="flex gap-4">
        <button wire:click="save" class="border border-green-400 px-4 py-2 hover:bg-green-300">Save Changes</button>
        <button wire:click="cancel" class="border border-yellow-600 px-4 py-2 hover:bg-yellow-400">Cancel</button>
    </div>
</div>
