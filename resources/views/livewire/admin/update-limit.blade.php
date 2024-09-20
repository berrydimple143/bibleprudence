<div class="w-full h-full p-5 bg-white flex flex-col gap-3 border border-green-400">   
    <div class="w-full ml-8">
        @error('limit')
            <p class="text-red-500 pl-10">{{ $message }}</p>
        @enderror
        @error('app')            
            <p class="text-red-500 pl-10">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="app" class="font-bold text-lg">App Name:</label>
            <input type="text" placeholder="Type app name here ..." class="border border-green-400 p-2 outline-none grow" wire:model="app" id="app"
                name="app">
        </div>        
        <div class="flex items-center gap-2 grow">
            <label for="limit" class="font-bold text-lg">Limit:</label>
            <input type="text" placeholder="Type limit here ..." class="border border-green-400 p-2 outline-none grow" wire:model="limit" id="limit"
                name="limit">
        </div>       
    </div>    
    <div class="flex gap-4 ml-20">
        <button wire:click="save" class="border border-green-400 px-4 py-2 hover:bg-green-300">Save</button>
        <button wire:click="cancel" class="border border-yellow-600 px-4 py-2 hover:bg-yellow-400">Cancel</button>
    </div>
</div>