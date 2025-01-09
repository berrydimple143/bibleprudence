<div class="w-full h-full p-5 bg-white flex flex-col gap-3 border border-green-400">
    <div class="flex flex-col gap-1">
        <div class="flex items-center gap-2 grow">
            <label for="main" class="font-bold text-lg">Main Point:</label>
            <input type="text" class="border border-green-400 @error('main') border-3 border-red-500 @enderror p-2 outline-none grow" wire:model="main" id="main"
                name="main">
        </div>
        @error('main')
            <p class="text-red-500 pl-24">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="verse" class="font-bold text-lg">Verse:</label>
            <input type="text" class="border border-green-400 @error('verse') border-3 border-red-500 @enderror p-2 outline-none grow" wire:model="verse" id="verse" name="verse">
        </div>
        <div class="flex items-center gap-2 grow">
            <label for="outline_id" class="font-bold text-lg">Outline Theme:</label>
            <select class="border border-green-400 p-3 @error('outline_id') border-3 border-red-500 @enderror outline-none grow" name="outline_id" id="outline_id"
                wire:model='outline_id'>
                <option value="">Select an outline theme here</option>
                @foreach ($outlines as $outline)
                <option value="{{ $outline->id }}">{{ $outline->theme }}</option>
                @endforeach
            </select>
        </div>
    </div>    
    <div class="flex gap-4">
        <div>
            @error('outline_id')
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