<div class="w-full h-full p-5 bg-white flex flex-col gap-3 border border-green-400">   
    <div class="w-full ml-8">
        @error('name')
            <p class="text-red-500 pl-10">{{ $message }}</p>
        @enderror
        @error('email')            
            <p class="text-red-500 pl-10">{{ $message }}</p>
        @enderror
        @error('message')            
            <p class="text-red-500 pl-10">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex gap-4">
        <div class="flex items-center gap-2 grow">
            <label for="name" class="font-bold text-lg">Name:</label>
            <input type="text" placeholder="Type name here ..." class="border border-green-400 p-2 outline-none grow" wire:model="name" id="name"
                name="name">
        </div>        
        <div class="flex items-center gap-2 grow">
            <label for="email" class="font-bold text-lg">Email:</label>
            <input type="text" placeholder="Type email here ..." class="border border-green-400 p-2 outline-none grow" wire:model="email" id="email"
                name="email">
        </div>       
    </div>
    <div class="flex gap-4">
        <div class="flex items-start gap-2 grow">
            <label for="message" class="font-bold text-lg">Message:</label>
            <textarea placeholder="Type your comment here ..."
                class="border border-green-600 grow p-2 @error('message') border-3 border-red-500 @enderror"
                name="message" wire:model="message" id="message" rows="10"></textarea>                
        </div>
    </div>
    <div class="flex gap-4 ml-20">
        <button wire:click="save" class="border border-green-400 px-4 py-2 hover:bg-green-300">Save Changes</button>
        <button wire:click="cancel" class="border border-yellow-600 px-4 py-2 hover:bg-yellow-400">Cancel</button>
    </div>
</div>