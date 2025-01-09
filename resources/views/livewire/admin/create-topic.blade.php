<div class="w-full h-full p-5 bg-white flex flex-col gap-3 border border-green-400">       
    <div class="flex flex-col gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="name" class="font-bold text-lg">Topic Name:</label>
            <input type="text" class="border border-green-400 p-2 outline-none grow" wire:model="name" id="name"
                name="name">
        </div>    
        <div>
            @error('name')
            <p class="text-red-500 pl-10">{{ $message }}</p>
            @enderror
        </div>        
    </div>
    <div class="flex gap-4">
        <button wire:click="save" class="border border-green-400 px-4 py-2 hover:bg-green-300">Save</button>
        <button wire:click="cancel" class="border border-yellow-600 px-4 py-2 hover:bg-yellow-400">Cancel</button>
    </div>
</div>