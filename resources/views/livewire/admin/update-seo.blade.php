<div class="w-full h-full p-5 bg-white flex flex-col gap-3 border border-green-400">   
    <div class="w-full ml-8">
        @error('page')
            <p class="text-red-500 pl-10">{{ $message }}</p>
        @enderror
        @error('title')            
            <p class="text-red-500 pl-10">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="page" class="font-bold text-lg">Page:</label>
            <input type="text" placeholder="Type page here ..." class="border border-green-400 p-2 outline-none grow" wire:model="page" id="page"
                name="page">
        </div>        
        <div class="flex items-center gap-2 grow">
            <label for="title" class="font-bold text-lg">Title:</label>
            <input type="text" placeholder="Type title here ..." class="border border-green-400 p-2 outline-none grow" wire:model="title" id="title"
                name="title">
        </div>       
    </div>
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="description" class="font-bold text-lg">Description:</label>
            <input type="text" placeholder="Type description here ..." class="border border-green-400 p-2 outline-none grow" wire:model="description" id="description"
                name="description">
        </div>        
        <div class="flex items-center gap-2 grow">
            <label for="url" class="font-bold text-lg">URL:</label>
            <input type="text" placeholder="Type url here ..." class="border border-green-400 p-2 outline-none grow" wire:model="url" id="url"
                name="url">
        </div>       
    </div>
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="author" class="font-bold text-lg">Author:</label>
            <input type="text" placeholder="Type author here ..." class="border border-green-400 p-2 outline-none grow" wire:model="author" id="author"
                name="author">
        </div>        
        <div class="flex items-center gap-2 grow">
            <label for="robots" class="font-bold text-lg">Robots:</label>
            <input type="text" placeholder="Type robots here ..." class="border border-green-400 p-2 outline-none grow" wire:model="robots" id="robots"
                name="robots">
        </div>       
    </div>
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="image" class="font-bold text-lg">Image URL:</label>
            <input type="text" placeholder="Type image url here ..." class="border border-green-400 p-2 outline-none grow" wire:model="image" id="image"
                name="image">
        </div>        
        <div class="flex items-center gap-2 grow">
            <label for="application_name" class="font-bold text-lg">Application Name:</label>
            <input type="text" placeholder="Type application name here ..." class="border border-green-400 p-2 outline-none grow" wire:model="application_name" id="application_name"
                name="application_name">
        </div>       
    </div>   
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="keywords" class="font-bold text-lg">Keywords:</label>
            <input type="text" placeholder="Type keywords here ..." class="border border-green-400 p-2 outline-none grow" wire:model="keywords" id="keywords"
                name="keywords">
        </div>        
        <div class="flex items-center gap-2 grow">
            <label for="generator" class="font-bold text-lg">Generator:</label>
            <input type="text" placeholder="Type generator here ..." class="border border-green-400 p-2 outline-none grow" wire:model="generator" id="generator"
                name="generator">
        </div>       
    </div>
    <div class="flex gap-4 ml-16">
        <button wire:click="save" class="border border-green-400 px-4 py-2 hover:bg-green-300">Save Changes</button>
        <button wire:click="cancel" class="border border-yellow-600 px-4 py-2 hover:bg-yellow-400">Cancel</button>
    </div>
</div>