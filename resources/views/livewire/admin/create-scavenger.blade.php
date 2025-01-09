<div class="w-full h-full p-5 bg-white flex flex-col gap-3 border border-green-400">
    <div class="flex flex-col gap-1">
        <div class="flex items-center gap-2 grow">
            <label for="question" class="font-bold text-lg">Question:</label>
            <input type="text" class="border border-green-400 p-2 outline-none grow" wire:model="question" id="question"
                name="question">
        </div>
        @error('question')
            <p class="text-red-500 pl-24">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="answer" class="font-bold text-lg">Answer:</label>
            <input type="text" class="border border-green-400 p-2 outline-none grow" wire:model="answer" id="answer"
                name="answer">
        </div>
        <div class="flex items-center gap-2 grow">
            <label for="verse" class="font-bold text-lg">Verse:</label>
            <input type="text" class="border border-green-400 p-2 outline-none grow" wire:model="verse" id="verse"
                name="verse">
        </div>
    </div>    
    <div class="flex gap-4">
        <div>
            @error('answer')
                <p class="text-red-500 pl-20">{{ $message }}</p>
            @enderror
        </div>
        <div>
            @error('verse')
                <p class="text-red-500 pl-96">{{ $message }}</p>
            @enderror
        </div>
    </div>    
    <div class="flex gap-4">
        <button wire:click="save" class="border border-green-400 px-4 py-2 hover:bg-green-300">Save</button>
        <button wire:click="cancel" class="border border-yellow-600 px-4 py-2 hover:bg-yellow-400">Cancel</button>
    </div>
</div>